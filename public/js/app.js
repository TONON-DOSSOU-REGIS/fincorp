/**
 * public/js/app.js
 * Script principal de l'application FinCorp
 */

document.addEventListener('DOMContentLoaded', function() {
    // 1. Initialisation des tooltips Bootstrap
    initTooltips();
    
    // 2. Gestion du scroll fluide
    setupSmoothScrolling();
    
    // 3. Formatage des entrées numériques
    setupInputFormatting();
    
    // 4. Gestion du menu mobile
    setupMobileMenu();
    
    // 5. Animation des éléments au scroll
    setupScrollAnimations();
    
    // 6. Validation des formulaires
    setupFormValidation();
});

/**
 * Initialise les tooltips Bootstrap
 */
function initTooltips() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl, {
            trigger: 'hover'
        });
    });
}

/**
 * Configure le scroll fluide pour les ancres
 */
function setupSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            if (this.getAttribute('href') === '#') return;
            
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            
            if (target) {
                window.scrollTo({
                    top: target.offsetTop - 80,
                    behavior: 'smooth'
                });
                
                // Fermer le menu mobile si ouvert
                const navbar = document.querySelector('.navbar-collapse');
                if (navbar && navbar.classList.contains('show')) {
                    bootstrap.Collapse.getInstance(navbar).hide();
                }
            }
        });
    });
}

/**
 * Formatage des entrées numériques (téléphone, montants)
 */
function setupInputFormatting() {
    // Formatage du téléphone
    const phoneInputs = document.querySelectorAll('input[type="tel"]');
    phoneInputs.forEach(input => {
        input.addEventListener('input', function(e) {
            const x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,2})(\d{0,2})(\d{0,2})/);
            e.target.value = !x[2] ? x[1] : x[1] + ' ' + x[2] + (x[3] ? ' ' + x[3] : '') + (x[4] ? ' ' + x[4] : '');
        });
    });

    // Formatage des montants
    const amountInputs = document.querySelectorAll('input[data-type="currency"]');
    amountInputs.forEach(input => {
        input.addEventListener('focus', function(e) {
            const value = e.target.value.replace(/\s/g, '').replace(',', '.');
            e.target.value = value !== '0' ? value : '';
        });

        input.addEventListener('blur', function(e) {
            const value = parseFloat(e.target.value.replace(/\s/g, '').replace(',', '.'));
            if (!isNaN(value)) {
                e.target.value = value.toLocaleString('fr-FR', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            }
        });
    });
}

/**
 * Gestion du menu mobile
 */
function setupMobileMenu() {
    const navbarToggler = document.querySelector('.navbar-toggler');
    if (navbarToggler) {
        navbarToggler.addEventListener('click', function() {
            const target = document.querySelector(this.dataset.bsTarget);
            if (target) {
                new bootstrap.Collapse(target, {
                    toggle: true
                });
            }
        });
    }
}

/**
 * Animation des éléments au scroll
 */
function setupScrollAnimations() {
    const animateElements = document.querySelectorAll('.animate-on-scroll');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });

    animateElements.forEach(el => observer.observe(el));
}

/**
 * Validation des formulaires
 */
function setupFormValidation() {
    // Validation du formulaire de contact
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Validation des champs requis
            const requiredFields = contactForm.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('is-invalid');
                    isValid = false;
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            // Validation spécifique pour l'email
            const emailField = contactForm.querySelector('input[type="email"]');
            if (emailField && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailField.value)) {
                emailField.classList.add('is-invalid');
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault();
                contactForm.querySelector('.is-invalid').focus();
            }
        });
    }
}

/**
 * Fonction pour le simulateur de prêt (sera étendue dans loan-simulator.js)
 */
function calculateLoan(amount, duration, interestRate) {
    const monthlyRate = interestRate / 100 / 12;
    const term = duration * 12;
    
    const monthlyPayment = (amount * monthlyRate) / (1 - Math.pow(1 + monthlyRate, -term));
    const totalInterest = (monthlyPayment * term) - amount;
    const totalPayment = monthlyPayment * term;
    
    return {
        monthlyPayment,
        totalInterest,
        totalPayment
    };
}