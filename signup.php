<?php
require_once(__DIR__ . '/config/mysql.php'); // DB settings
require_once(__DIR__ . '/databaseconnect.php'); // PDO connection
require_once(__DIR__ . '/variables.php'); // Any custom variables

// Function to check password against Have I Been Pwned
function isPasswordPwned($password) {
    $hashedPassword = strtoupper(sha1($password));
    $prefix = substr($hashedPassword, 0, 5); // First 5 characters
    $suffix = substr($hashedPassword, 5);   // Remaining characters
    
    // API endpoint
    $url = "https://api.pwnedpasswords.com/range/" . $prefix;

    // Make the API call
    $response = file_get_contents($url);
    if ($response === false) {
        throw new Exception("Failed to fetch data from Have I Been Pwned API.");
    }

    // Check if suffix exists in response
    $lines = explode("\n", $response);
    foreach ($lines as $line) {
        list($hashSuffix, $count) = explode(':', $line);
        if (trim($hashSuffix) === $suffix) {
            return (int)$count; // Return the count of occurrences
        }
    }
    return 0; // Password not found in breaches
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $login = htmlspecialchars(trim($_POST['login']));
    $password = htmlspecialchars(trim($_POST['password']));

    if (empty($nom) || empty($prenom) || empty($login) || empty($password)) {
        $error = "Tous les champs doivent être remplis.";
    } elseif (strlen($password) < 6) {
        $error = "Le mot de passe doit contenir au moins 6 caractères.";
    } else {
        try {
            // Check password with HIBP
            $pwnedCount = isPasswordPwned($password);
            if ($pwnedCount > 0) {
                $error = "Le mot de passe a été compromis dans $pwnedCount violations de données. Veuillez choisir un mot de passe différent.";
            } else {
                // Hash password and insert into database
                $hashedPassword = hashPasswordWithPython($password);

                $sql = "INSERT INTO users (nom, prenom, login, mdp) VALUES (:nom, :prenom, :login, :password)";
                $stmt = $mysqlClient->prepare($sql);

                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':login', $login);
                $stmt->bindParam(':password', $hashedPassword);

                if ($stmt->execute()) {
                    $success = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
                } else {
                    $error = "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
                }
            }
        } catch (Exception $e) {
            $error = "Erreur : " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>SignUp</title>
</head>
<body class="cacaca">

    <section id="signup">
        <h1 id="title" class="auth">Sign Up</h1>
        <form class="auth1" action="" method="POST">
            <div>
                <label for="nom" class="form-label">Nom</label><br>
                <input type="text" class="form-control" name="nom" id="nom" placeholder="Pablo" required>
            </div>
            <div>
                <label for="prenom" class="form-label">Prenom</label><br>
                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Escobar" required>
            </div>
            <div>
                <label for="login" class="form-label">Login</label><br>
                <input type="text" class="form-control" name="login" id="login" placeholder="Escobar93laruelavraie" required>
            </div>
            <div>
                <label for="password" class="form-label">Mot de passe</label><br>
                <input type="password" class="form-control" name="password" id="password" placeholder="*************" required>
            </div>
            <button type="submit" class="btn">Submit</button>
            <a id="redirect" class="home" href="login.php">login here</a>
            <a id="redirect" class="home" href="index.php">home</a>
        </form>
        <div class="message">
            <?php if (isset($error)): ?>
                <div style="color: red;"><?= $error ?></div>
            <?php endif; ?>

            <?php if (isset($success)): ?>
                <div style="color: green;"><?= $success ?></div>
            <?php endif; ?>
            </div>
    </section>
</body>
</html>
