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
            <h1 class="heading"><?php echo $projects[1]['name'];?></h1>
            <p class="project-description"><?php echo $projects[1]['description']; ?></p>
            <div class="projet-content">
                <div class="features">
                    <h2>Fonctionnalités principales :</h2>
                    <ul>
                        <li>Connexion en temps réel : Échangez avec des mentors via messagerie instantanée ou appels vidéo pour des réponses immédiates.</li>
                        <li>Planification de sessions : Réservez des sessions de tutorat et recevez des notifications automatiques pour vous rappeler vos rendez-vous.</li>
                        <li>Suivi des progrès : Suivez votre évolution grâce à un tableau de bord centralisé et des rapports détaillés sur les interactions avec les mentors.</li>
                    </ul>
        
                    <h2>Technologies utilisées :</h2>
                    <ul>
                        <?php foreach ($technologies[1] as $technology): ?>
                            <li><?php echo $technology; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <h2>Défis rencontrés :</h2>
                    <p>
                        L'implémentation des fonctionnalités de communication en temps réel avec une faible latence a exigé l’optimisation via WebSockets pour une expérience fluide. De plus, l’adaptation de l’interface utilisateur pour garantir une expérience optimale sur mobile a été un défi majeur.
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