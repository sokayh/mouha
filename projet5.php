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
            <h1 class="heading"><?php echo $projects[4]['name'];?></h1>
                <p class="project-description"><?php echo $projects[4]['description']; ?></p>

            <div class="projet-content">
                <div class="features">
                    <h2>Fonctionnalités principales :</h2>
                    <ul>
                        <li>Gestion de billetterie : Créez, personnalisez et gérez des billets électroniques pour vos événements.</li>
                        <li>Réservations simplifiées : Gérez les inscriptions et les places disponibles avec des mises à jour en temps réel.</li>
                        <li>Diffusion en direct : Intégrez des vidéos live pour atteindre un public plus large directement via la plateforme.</li>
                    </ul>
        
                    <h2>Technologies utilisées :</h2>
                    <ul>
                        <?php foreach ($technologies[4] as $technology): ?>
                            <li><?php echo $technology; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <h2>Défis rencontrés :</h2>
                    <p>
                        Garantir une diffusion en direct stable et synchronisée pour les événements en ligne a exigé une optimisation avancée avec WebSockets et CDN pour une faible latence. De plus, l’intégration de la gestion des paiements a nécessité une attention particulière pour la conformité aux normes de sécurité (PCI-DSS).
                    </p>

                    <h2>Résultats obtenus :</h2>
                    <p>
                        - Plus de 5 000 utilisateurs inscrits au cours des trois premiers mois.<br>
                        - Avis positifs avec une note moyenne de 4,7/5 sur l’expérience utilisateur.<br>
                        - Collaboration avec plus de 200 organisateurs d'événements, incluant des entreprises et des associations.
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="/scripts/Mouha.js"></script>
</html>