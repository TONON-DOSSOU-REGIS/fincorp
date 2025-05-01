<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <h5 class="mb-4 text-white">FinCorp</h5>
                <p class="text-muted text-white">Solutions de financement adaptées à vos besoins personnels et professionnels.</p>
                <div class="social-icons mt-4">
                    <a href="#" class="text-decoration-none me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-decoration-none me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-decoration-none me-3"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="text-decoration-none"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 text-amber-50">
                <h5 class="mb-4 text-white">Liens rapides</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-decoration-none text-white">Accueil</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}" class="text-decoration-none text-white">À propos</a></li>
                    <li class="mb-2"><a href="{{ route('services') }}" class="text-decoration-none text-white">Services</a></li>
                    <li class="mb-2"><a href="{{ route('loan.simulator') }}" class="text-decoration-none text-white">Simulateur</a></li>
                    <li><a href="{{ route('contact') }}" class="text-decoration-none text-white">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5 class="mb-4 text-white">Services</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-decoration-none text-white">Prêts immobiliers</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-white">Prêts personnels</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-white">Crédits auto/moto</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-white">Prêts professionnels</a></li>
                    <li><a href="#" class="text-decoration-none text-white">Rachat de crédits</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5 class="mb-4 text-white">Contact</h5>
                <ul class="list-unstyled">
                    <li class="mb-2 text-white"><i class="fas fa-map-marker-alt me-2"></i> 123 Avenue des Champs-Élysées, 75008 Paris</li>
                    <li class="mb-2 text-white"><i class="fas fa-phone-alt me-2"></i> +33 1 23 45 67 89</li>
                    <li class="mb-2 text-white"><i class="fas fa-envelope me-2"></i> contact@fincorpfinance.fr</li>
                    <li class="mb-2 text-white"><i class="fas fa-clock me-2"></i> Lun-Ven : 9h-18h</li>
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
                    <li class="list-inline-item"><a href="{{ route('mentions-legales') }}" class="text-decoration-none">Mentions légales</a></li>
                    <li class="list-inline-item"><span class="mx-2">|</span></li>
                    <li class="list-inline-item"><a href="{{ route('politique-de-confidentialite') }}" class="text-decoration-none">Politique de confidentialité</a></li>
                    <li class="list-inline-item"><span class="mx-2">|</span></li>
                    <li class="list-inline-item"><a href="#" class="text-decoration-none">CGU</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>