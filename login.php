<?php
session_start(); // Start the session at the beginning of the script
require_once(__DIR__ . '/config/mysql.php'); // Database configuration
require_once(__DIR__ . '/databaseconnect.php'); // PDO connection to database
require_once(__DIR__ . '/variables.php'); // Optional: additional variables

// Initialize variables for error/success messages
$error = "";
$success = "";


// If logout is requested
if (isset($_GET['logout'])) {
    session_unset(); // Remove all session variables
    session_destroy(); // Destroy the session
    header("Location: login.php"); // Redirect to login page
    exit;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize user input
    $login = htmlspecialchars(trim($_POST['login']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Validate input fields
    if (empty($login) || empty($password)) {
        $error = "Veuillez remplir tous les champs.";
    } else {
        try {
            // Prepare the SQL statement to fetch the user
            $sql = "SELECT * FROM users WHERE login = :login";
            $stmt = $mysqlClient->prepare($sql);
            $stmt->bindParam(':login', $login);

            // Execute the query
            $stmt->execute();

            // Fetch the user data
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if user exists
            if ($user) {
                $hashedInputPassword = hashPasswordWithPython($password);
                if ($hashedInputPassword === $user['mdp']) {
                    // Success: Store user data in session variables
                    $_SESSION['auth'] = true; // Mark the user as authenticated
                    $_SESSION['login'] = $user['login']; // Store login in session
                    $_SESSION['prenom'] = $user['prenom']; // Store the first name in session
                    $_SESSION['nom'] = $user['nom']; // Store the last name in session
                    $_SESSION['user_id'] = $user['id']; // Store user ID in session
                    $_SESSION['password'] = $hashedPassword; // Store the password in session for leak check


                    // Redirect to the same page to show user details
                    header("Location: index.php");
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
    <title>Login</title>
</head>
<body class="cacaca">
    <?php if (isset($_SESSION['auth']) && $_SESSION['auth']): ?>
        <!-- User Details -->
        <section id="user-details" >
            <h1>Bienvenue, <?= htmlspecialchars($_SESSION['prenom'] . ' ' . $_SESSION['nom']) ?>!</h1>
            <p><strong>Login:</strong> <?= htmlspecialchars($_SESSION['login']) ?></p>
            <p><strong>ID:</strong> <?= htmlspecialchars($_SESSION['user_id']) ?></p>
            <a href="?logout=true" class="btn logout">Déconnexion</a>
            <a href="index.php" class="btn logout">Visiter le Portfolio</a>
        </section>
    <?php else: ?>
        <!-- Display error or success messages -->
        <?php if (!empty($error)): ?>
            <div style="color: red;"><?= $error ?></div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div style="color: green;"><?= $success ?></div>
        <?php endif; ?>

        <!-- Login Form -->
        <section id="signup">
            <h1 id="title1" class="auth">Log In</h1>
            <form class="auth1" action="" method="POST">
                <div>
                    <label for="login" class="form-label">Username</label>
                    <input type="text" class="form-control" name="login" id="login" placeholder="momo" required>
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="momo123" required>
                </div>
                <button type="submit" class="btn">Submit</button>
                <a id="redirect1" class="home" href="signup.php">I don't have an account</a>
            </form>
        </section>
    <?php endif; ?>
</body>
</html>
