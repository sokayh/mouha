-- SQLBook: Code
-- Database Creation 
CREATE DATABASE IF NOT EXISTS `projects_portfolio`;
USE `projects_portfolio`;
DROP TABLE IF EXISTS `projects`;


-- Table Creation

CREATE TABLE IF NOT EXISTS `projects` (
    `project_id` int AUTO_INCREMENT,
    `name` varchar(30) NOT NULL,
    `description` varchar(500),
    `image_path`varchar(40),
    `project_link` varchar(20),
    `category` VARCHAR(20),
    `created_date` DATE NOT NULL,
    `technology_used` VARCHAR(50) NOT NULL,
    `team_size` INT,
    PRIMARY KEY (`project_id`) 
);

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `nom` varchar(30) NOT NULL,
    `prenom` varchar(30) NOT NULL,
    `login`varchar(50) NOT NULL,
    `mdp` varchar(255) NOT NULL
);


-- Removing Old Data
DELETE FROM `projects`;
DELETE FROM `users`;

-- Data Insertion

INSERT INTO `projects` (`name`, `description`, `image_path`, `project_link`, `category`, `created_date`, `technology_used`, `team_size`)
VALUES 
('EloMentorat', "EloMentorat est une plateforme de mentorat en ligne conçue pour connecter des étudiants à des mentors qualifiés dans divers domaines. L'application permet des sessions de questions/réponses en temps réel, la planification de rendez-vous, et des outils interactifs pour maximiser l'apprentissage.", 'assets/images/elo.jpg', 'projet1.php', 'Education', '2024-01-01', 'PHP, MySQL, JavaScript', 5),
('LearnBuddy', "LearnBuddy est une application de mentorat en ligne où les étudiants peuvent se connecter avec des experts pour poser des questions en temps réel ou planifier des sessions de tutorat. L'application facilite l'accès à un apprentissage personnalisé et interactif, permettant aux étudiants d’améliorer leurs compétences dans divers domaines.", 'assets/images/projet2.jpg', 'projet2.html', 'Education', '2024-02-01', 'React, Node.js, MongoDB', 4),
('MyFitPlanner', "MyFitPlanner est un planificateur de fitness interactif permettant aux utilisateurs de créer des programmes d'entraînement personnalisés et de suivre leur progression quotidienne. L'application aide les utilisateurs à atteindre leurs objectifs de fitness de manière structurée et motivante, en offrant une expérience conviviale et complète.", 'assets/images/projet3.jpg', 'projet3.html', 'Fitness', '2024-03-01', 'Flutter, Firebase', 3),
('CodeSync', "CodeSync est un outil collaboratif pour développeurs permettant de travailler sur du code en temps réel, de gérer des versions et de discuter directement dans l’éditeur. L'application facilite la collaboration entre développeurs à distance et optimise le processus de développement en équipe.", 'assets/images/projet4.jpg', 'projet4.html', 'Collaboration', '2024-04-01', 'Vue.js, Laravel, WebSocket', 6),
('EventSphere', "EventSphere est une plateforme de gestion d'événements conçue pour les particuliers et les entreprises, intégrant des fonctionnalités de billetterie, de réservation et de diffusion en direct. L'application simplifie l'organisation et la participation aux événements tout en offrant une expérience utilisateur fluide et efficace.", 'assets/images/projet5.jpg', 'projet5.html', 'Events', '2024-05-01', 'Django, PostgreSQL', 8);
