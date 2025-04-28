<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <h5 class="mb-4">FinCorp</h5>
                <p>Solutions de financement adaptées à vos besoins personnels et professionnels.</p>
                <div class="social-icons mt-4">
                    <a href="#" class="text-decoration-none me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-decoration-none me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-decoration-none me-3"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="text-decoration-none"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <h5 class="mb-4">Liens rapides</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-decoration-none">Accueil</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}" class="text-decoration-none">À propos</a></li>
                    <li class="mb-2"><a href="{{ route('services') }}" class="text-decoration-none">Services</a></li>
                    <li class="mb-2"><a href="{{ route('loan.simulator') }}" class="text-decoration-none">Simulateur</a></li>
                    <li><a href="{{ route('contact') }}" class="text-decoration-none">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5 class="mb-4">Services</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-decoration-none">Prêts immobiliers</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none">Prêts personnels</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none">Crédits auto/moto</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none">Prêts professionnels</a></li>
                    <li><a href="#" class="text-decoration-none">Rachat de crédits</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5 class="mb-4">Contact</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> 123 Avenue des Champs-Élysées, 75008 Paris</li>
                    <li class="mb-2"><i class="fas fa-phone-alt me-2"></i> +33 1 23 45 67 89</li>
                    <li class="mb-2"><i class="fas fa-envelope me-2"></i> contact@fincorp.fr</li>
                    <li><i class="fas fa-clock me-2"></i> Lun-Ven : 9h-18h</li>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <div class="row">
            <div class="col-md-6">
                <p class="mb-0">&copy; {{ date('Y') }} FinCorp. Tous droits réservés.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#" class="text-decoration-none">Mentions légales</a></li>
                    <li class="list-inline-item"><span class="mx-2">|</span></li>
                    <li class="list-inline-item"><a href="#" class="text-decoration-none">Politique de confidentialité</a></li>
                    <li class="list-inline-item"><span class="mx-2">|</span></li>
                    <li class="list-inline-item"><a href="#" class="text-decoration-none">CGU</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>