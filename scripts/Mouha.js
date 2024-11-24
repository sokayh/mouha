const navMenu = document.querySelector('.nav');
const menuToggle = document.querySelector('.Menu');

menuToggle.addEventListener('click', () => navMenu.classList.toggle('active'));

document.addEventListener('click', (e) => {
    if (!navMenu.contains(e.target) && !menuToggle.contains(e.target)) {
        navMenu.classList.remove('active');
    }
});

let sections = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header nav a');

window.onscroll = () => {
    let top = window.scrollY;

    sections.forEach(sec => {
        let offset = sec.offsetTop - 10;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        // Vérifie si la section est visible
        if (top >= offset && top < offset + height) {
            // Supprime la classe active des autres liens
            navLinks.forEach(link => link.classList.remove('active'));

            // Ajoute la classe active au lien correspondant
            let currentLink = document.querySelector('header nav a[href*=' + id + ']');
            if (currentLink) {
                currentLink.classList.add('active');
            }
        }
    });
};

// Ajout de la gestion du clic pour la navigation avec effet de scroll fluide
navLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        // Si le lien est interne (commence par #), on empêche le comportement par défaut pour appliquer un scroll fluide
        if (link.getAttribute('href').startsWith('#')) {
            // Empêcher le comportement par défaut
            e.preventDefault();

            // Retirer la classe active de tous les liens
            navLinks.forEach(link => link.classList.remove('active'));

            // Ajouter la classe active au lien cliqué
            e.target.classList.add('active');

            // Défilement fluide vers la section cible
            let targetSection = document.querySelector(e.target.getAttribute('href'));
            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth', // Défilement fluide
                    block: 'start'      // Positionner le haut de la section en haut de la page
                });
            }
        }
        // Sinon, pour les liens externes (comme "contact.html"), laisser le comportement normal
        // Le lien sera suivi normalement
    });
});
