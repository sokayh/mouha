<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');


// Check if the user is authenticated
if (!$_SESSION['auth']) {
    // Redirect to login.php with the current page as the redirect parameter
    $currentPage = urlencode($_SERVER['REQUEST_URI']); // Encodes the current URL
    header("Location: login.php?redirect=" . $currentPage);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="styles/projet1.css">
    <title>Portfolio Website</title>
</head>
<body>
    <header>
        <a href="index.php" class="logo">Moûha <span id="utahmer">Ötahmer</span></a>
        <button class="Menu" onclick="toggleMenu()"><i class="fa-solid fa-bars" style="font-size: 40px;"></i></button>
        <nav class="nav">
            <a href="index.php" class="active"> Home</a>
            <a href="index.php#skills" >Skills</a>
            <a id="educ_navbar" href="index.php#education">Education</a>
            <a href="index.php#projets" >Projet</a>
            <a href="contact.php" >Contact</a> 
            <a id="cont_navbar" href="login.php" >My Profile</a>
        </nav>
    </header>
    <section id="projet-detail">
        <div class="wrapper">
            <h1 class="heading"><?php echo $projects[0]['name']; ?></h1>
            <p class="project-description"><?php echo $projects[0]['description']; ?></p>

            <div class="projet-content">

                <div class="features">
                    <h2>Fonctionnalités principales :</h2>
                    <ul>
                        <li>**Connexion en temps réel** avec des mentors via une messagerie instantanée ou des appels vidéo.</li>
                        <li>**Planification d'événements** : Réservez des sessions avec des notifications automatiques.</li>
                        <li>**Tableau de bord utilisateur** pour suivre votre progression et vos interactions.</li>
                    </ul>
        
                    <h2>Technologies utilisées :</h2>
                    <ul>
                        <?php foreach ($technologies[0] as $technology): ?>
                            <li><?php echo $technology; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <ul>
                        L'implémentation de la communication en temps réel avec une faible latence a nécessité une optimisation importante 
                        à l'aide de **WebSockets**. De plus, garantir une expérience fluide sur mobile a impliqué une refonte de plusieurs 
                        éléments de l'interface.
                    </p>

                    <h2>Résultats obtenus :</h2>
                    <p>
                        - Plus de 2 000 utilisateurs actifs lors du premier mois.<br>
                        - Évaluations positives des utilisateurs, avec une note moyenne de 4,8/5.<br>
                        - Une collaboration avec 150 mentors certifiés.
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="/scripts/Mouha.js"></script>
</html>
