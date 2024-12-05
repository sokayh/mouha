<?php
require_once(__DIR__ . '/config/mysql.php'); // Assuming this contains DB settings like host, user, pass
require_once(__DIR__ . '/databaseconnect.php'); // Assuming this creates a $conn PDO object
require_once(__DIR__ . '/variables.php'); // Any custom variables you need

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form data
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $login = htmlspecialchars(trim($_POST['login']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Validation (basic example)
    if (empty($nom) || empty($prenom) || empty($login) || empty($password)) {
        $error = "Tous les champs doivent être remplis.";
    } elseif (strlen($password) < 6) {
        $error = "Le mot de passe doit contenir au moins 6 caractères.";
    } else {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        try {
            // Prepare SQL statement
            $sql = "INSERT INTO users (nom, prenom, login, mdp) VALUES (:nom, :prenom, :login, :password)";
            $stmt = $mysqlClient->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':password', $hashedPassword);

            // Execute the query
            if ($stmt->execute()) {
                $success = "Inscription réussie ! Vous pouvez maintenant vous connecter."; 
            } else {
                $error = "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
            }
        } catch (PDOException $e) {
            // Catch any database errors
            $error = "Erreur de base de données : " . $e->getMessage();
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
    <!-- Display success or error messages -->
    <?php if (isset($error)): ?>
        <div style="color: red;"><?= $error ?></div>
    <?php endif; ?>

    <?php if (isset($success)): ?>
        <div style="color: green;"><?= $success ?></div>
    <?php endif; ?>

    <!-- Signup Form -->
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
    </section>
</body>
</html>
