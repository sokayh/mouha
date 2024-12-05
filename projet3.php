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
            <h1 class="heading"><?php echo $projects[2]['name'];?></h1>
                <p class="project-description"><?php echo $projects[2]['description']; ?></p>

            <div class="projet-content">
                <div class="features">
                    <h2>Fonctionnalités principales :</h2>
                    <ul>
                        <li>Création de programmes personnalisés : Conception d’entraînements sur mesure en fonction des objectifs et des préférences de chaque utilisateur.</li>
                        <li>Suivi de progression : Suivi des performances et des progrès quotidiens, avec des graphiques et des statistiques.</li>
                        <li>Rappels et notifications : Notifications pour les séances d’entraînement à venir et rappels pour rester motivé.</li>
                    </ul>
        
                    <h2>Technologies utilisées :</h2>
                    <ul>
                        <?php foreach ($technologies[2] as $technology): ?>
                            <li><?php echo $technology; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <h2>Défis rencontrés :</h2>
                    <p>
                        L'intégration de l’API de suivi de santé a nécessité une gestion précise des données des utilisateurs tout en respectant les normes de confidentialité. De plus, optimiser les notifications et rappels pour chaque utilisateur a demandé une personnalisation poussée de l'expérience.
                    </p>

                    <h2>Résultats obtenus :</h2>
                    <p>
                        - Plus de 10 000 utilisateurs actifs dès les trois premiers mois.<br>
                        - Note moyenne de 4,8/5 pour l’expérience utilisateur et la personnalisation des programmes.<br>
                        - Collaboration avec plusieurs influenceurs fitness pour des programmes exclusifs.
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="/scripts/Mouha.js"></script>
</html>