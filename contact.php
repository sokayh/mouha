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
            <a href="index.php" > Home</a>
            <a href="index.php#skills" >Skills</a>
            <a id="educ_navbar" href="index.php#education">Education</a>
            <a href="index.php#projets" >Projet</a>
            <a href="contact.php" class="active" >Contact</a> 
            <a id="cont_navbar" href="login.php" >My Profile</a>
        </nav>
    </header>
    <section id="projet-detail">
        <div class="wrapper">
            <h1 class="heading">Contact</h1>
            <div class="projet-content">
                <div class="features">
                    <h2>Vous avez un projet, une idée, ou simplement envie de discuter ? N’hésitez pas à me contacter !</h2><br><br>
                    <ul>
                        <li>Basé à : Paris Stalingrad, France</li>
                        <li>Téléphone : +33 6 12 34 56 78</li>
                        <li>E-mail : mouha.otahmer@gmail.com</li>
                    </ul><br><br>
        
                    <h2>Réseaux sociaux</h2>
                    <ul>
                        <li><strong>Linkedin :</strong> linkedin.com/in/mouhaotahmer</li>
                        <li><strong>Instagram :</strong> instagram.com/mouha.otahmer</li>
                        <li><strong>Behance :</strong> behance.net/mouhaotahmer</li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </section>
</body>
<script src="/scripts/Mouha.js"></script>
</html>