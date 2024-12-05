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
            <h1 class="heading"><?php echo $projects[3]['name'];?></h1>
                <p class="project-description"><?php echo $projects[3]['description']; ?></p>
                     <div class="projet-content">
                <div class="features">
                    <h2>Fonctionnalités principales :</h2>
                    <ul>
                        <li>Collaboration en temps réel : Éditez le code simultanément avec d'autres membres de l'équipe.</li>
                        <li>Gestion des versions : Suivez l’historique des modifications et gérez les versions du code.</li>
                        <li>Discussion intégrée : Discutez directement dans l'éditeur via une messagerie instantanée ou un chat vocal.</li>
                    </ul>
        
                    <h2>Technologies utilisées :</h2>
                    <ul>
                        <?php foreach ($technologies[3] as $technology): ?>
                            <li><?php echo $technology; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <h2>Défis rencontrés :</h2>
                    <p>
                        Assurer la synchronisation en temps réel avec une faible latence pour une expérience de codage fluide a nécessité l’utilisation de WebSockets et une optimisation poussée du backend. De plus, la gestion des conflits de code dans un environnement collaboratif a nécessité une approche robuste de contrôle de version.
                    </p>

                    <h2>Résultats obtenus :</h2>
                    <p>
                        - Plus de 3 000 développeurs inscrits dès les premiers mois.<br>
                        - Note moyenne de 4,9/5 sur la qualité de la collaboration en temps réel.<br>
                        - Plus de 100 projets collaboratifs lancés avec des équipes internationales.
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="/scripts/Mouha.js"></script>
</html>
