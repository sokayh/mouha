<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');

?>
<?php

// Check if the user is authenticated
if (!$_SESSION['auth']) {
    // If not authenticated, redirect to login.php
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Portfolio Website</title>
</head>
<body>
    <header>
        <a href="#" class="logo">Moûha <span id="utahmer">Ötahmer</span></a>
        <button class="Menu" onclick="toggleMenu()"><i class="fa-solid fa-bars" style="font-size: 40px;"></i></button>
        <nav class="nav">
            <a id="home_navbar" href="#home"> Home</a>
            <a id="skil_navbar" href="#skills" >Skills</a>
            <a id="educ_navbar" href="#education" >Education</a>
            <a id="proj_navbar" href="#projets" >Projet</a>
            <a id="cont_navbar" href="contact.php" >Contact</a> 
            <a id="cont_navbar" href="login.php" >My Profile</a>
        </nav>
    </header>
    <?php 
    $_SESSION["auth"] = "user";
    echo "Accessed as user"
    ?>
    <section class="home" id="home">
        <div class="home-img">
            <img src="assets/images/main.jpg" alt="">
        </div>
        <div class="home-content">
            <h1>Salut, c'est <span>Moûha</span></h1>
            <h3 class="typing-text">Je suis un <span></span></h3>
            <p>Je suis un jeune développeur web full stack. Passionné par la cybersécurité depuis mon plus jeune âge,  j’ai d’abord débuté avec le pentest et le reverse engineering. Mes connaissances en backend et en frontend sont tellement grandes, qu’aucune faille dans le code ne m’échappe.
            </p>

            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                <a href="#"><i class="fa-brands fa-github"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </div>
            <a href="#skills" class="btn">Embauchez moi pitié</a>
        </div>
    </section>
    <div id="grad1"></div>
    <section class="skills" id="skills">
        <!-- HARD SKILLS -->
        <h1 class="heading">Hard Skills</h1>
        <div class="skills-content" id ="test">
            <div class="skills-box">
                <div class="skills-box-info">
                    <h1><p>Programming</p></h1><br> 
                    <h3>
                        JavaScript, Java, Bash, PHP, CSS, HTML, Yaml, Toml
                    </h3>
                </div>
            </div>
            <div class="skills-box">
                <div class="skills-box-info">
                    <h1><p>Databases & Cloud Services</p></h1><br>
                    <h3>
                        MySQL, PostgreSQL, MongoDB, Redis, Oracle WebLogic, GCP
                    </h3>
                </div>
            </div>
            <div class="skills-box">
                <div class="skills-box-info">
                    <h1><p>Tools</p></h1><br>
                    <h3>  
                        Packer, Docker, Kubernetes, Ansible, Puppet
                    </h3>
                </div>
            </div>
        </div> 
        <!-- SOFT SKILLS -->
        <h1 class="heading">Soft Skills</h1>
        <div class="skills-content" id ="test">
            <div class="skills-box">
                <div class="skills-box-info">
                    <h1><p>Résistant au stress</p></h1>
                </div>
            </div>
            <div class="skills-box">
                <div class="skills-box-info">
                    <h1><p>Très bon esprit d’équipe</p></h1>
                </div>
            </div>
            <div class="skills-box">
                <div class="skills-box-info">
                    <h1><p>A l’écoute des collègues</p></h1>
                </div>
            </div>
            <div class="skills-box">
                <div class="skills-box-info">
                    <h1><p>Flexible face au défis</p></h1>
                </div>
            </div>
            <div class="skills-box">
                <div class="skills-box-info">
                    <h1><p>Adaptable à toutes les situations</p></h1>
                </div>
            </div>
            <div class="skills-box">
                <div class="skills-box-info">
                    <h1><p>Leadership</p></h1>
                </div>
            </div>
        </div> 
        
    </section>
    <div id="grad2"></div>
    <!-- EDUCATION -->
    <section class="education" id="education">
            <h1 class="heading">Education</h1>
        <div class="timeline-items">
            
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                    <div class="timeline-date">2012-2016</div>
                    <div class="timeline-content">
            <h3>Licence en Informatique </n> Massachusetts Institute of Technology (MIT)</h3>
            <p>
                Formation axée sur les algorithmes, la programmation (Python, Java, C++), les bases de données relationnelles (SQL) et le développement web (HTML, CSS, JavaScript).
                    </div>
                
            </div>
        

        <div class="timeline-item">
            <div class="timeline-dot"></div>
                <div class="timeline-date">2016-2018</div>
                <div class="timeline-content">
        <h3>Master en Informatique </n> 
            - Stanford University</h3>
        <p>
            Expertise en développement full stack : technologies back-end (Node.js, Django) et front-end (React, Vue.js). Maîtrise des systèmes distribués, des applications scalables et des outils DevOps (Docker, Kubernetes).
        </p>
                </div>
            
        </div>

        <div class="timeline-item">
            <div class="timeline-dot"></div>
                <div class="timeline-date">2022</div>
                <div class="timeline-content">
        <h3>Certification <br> 'Certified Kubernetes Administrator'</h3>
        <p>
            Expert en gestion et orchestration d’applications conteneurisées.
        </p>
                </div>
            
        </div>
    </div>
    </section>
</section>
<div id="grad3"></div>
<!-- PROJECTS -->
<section class="projets" id="projets">
        <h1 class="heading">Projets</h1>
        <div class="project-box">
            <div class="wrapper">
                <a href="projet1.php">
                    <div class="project-box-content">
                        <img src="assets/images/elo.jpg">
                        <h2>EloMentorat</h2>
                        <p>
                            EloMentorat est une plateforme de mentorat en ligne conçue pour connecter des étudiants à des mentors qualifiés dans divers domaines.</p>
                    </div>
                </a>
                <a href="projet2.php">
                    <div class="project-box-content">
                        <img src="assets/images/projet2.jpg">
                        <h2>LearnBuddy</h2>
                        <p>
                            Une application de mentorat en ligne où les étudiants peuvent se connecter avec des experts pour poser des questions en temps réel ou planifier des sessions de tutorat.
                        </p> 
                    </div>
                </a>
                <a href="projet3.php">
                    <div class="project-box-content">
                        <img src="assets/images/projet3.jpg">
                        <h2>MyFitPlanner</h2>
                        <p> 
                            Un planificateur de fitness interactif permettant aux utilisateurs de créer des programmes d'entraînement personnalisés et de suivre leur progression quotidienne.
                        </p> 
                    </div>
                </a>
                <a href="projet4.php">
                    <div class="project-box-content">
                        <img src="assets/images/projet4.jpg">
                        <h2>CodeSync</h2>
                        <p> 
                            Un outil collaboratif pour développeurs permettant de travailler sur du code en temps réel, de gérer des versions, et de discuter directement dans l’éditeur.
                        </p> 
                    </div>
                </a>
                <a href="projet5.php">
                    <div class="project-box-content">
                        <img src="assets/images/projet5.jpg">
                        <h2>EventSphere</h2>
                        <p> Une plateforme de gestion d'événements pour les particuliers et les entreprises, intégrant des fonctionnalités de billetterie, de réservation, et de diffusion en direct.
                        </p> 
                    </div>
                </a>
            </div>  
        </div>
</section>
</body>
<script src="scripts/Mouha.js"></script>
</html>







