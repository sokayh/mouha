<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');

$error = "";
$success = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = htmlspecialchars(trim($_POST['login']));
    $password = htmlspecialchars(trim($_POST['password']));

    if (empty($login) || empty($password)) {
        $error = "Veuillez remplir tous les champs.";
    } else {
        try {
            $sql = "SELECT * FROM users WHERE login = :login";
            $stmt = $mysqlClient->prepare($sql);
            $stmt->bindParam(':login', $login);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if (password_verify($password, $user['mdp'])) {
                    // Successful login
                    $_SESSION['auth'] = true;
                    $_SESSION['login'] = $user['login'];
                    $_SESSION['prenom'] = $user['prenom'];
                    $_SESSION['user_id'] = $user['id'];

                    // Check if a redirect URL was provided
                    if (isset($_GET['redirect'])) {
                        $redirect = urldecode($_GET['redirect']); // Decode the target URL
                        header("Location: " . $redirect); // Redirect to the original page
                    } else {
                        // Default redirect to index.php
                        header("Location: index.php");
                    }
                    exit;
                } else {
                    $error = "Mot de passe incorrect.";
                }
            } else {
                $error = "Utilisateur non trouvé.";
            }
        } catch (PDOException $e) {
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
