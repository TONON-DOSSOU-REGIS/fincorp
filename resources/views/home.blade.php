@extends('layouts.app')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Solutions de financement adaptées à vos besoins</h1>
                <p class="lead mb-4">Obtenez le prêt dont vous avez besoin avec des taux compétitifs et un processus simplifié.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('loan.simulator') }}" class="btn btn-primary btn-lg">Simuler un prêt</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg">Nous contacter</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="images/i10.jpg" alt="Finance" class="img-fluid rounded shadow h-100 w-100">
            </div>
        </div>
    </div>
</section>

<section class="features-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Pourquoi choisir FinCorp ?</h2>
            <p class="text-muted">Nous offrons des solutions financières sur mesure</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary mb-4">
                            <i class="fas fa-percent fa-2x"></i>
                        </div>
                        <h5>Taux compétitifs</h5>
                        <p class="text-muted">Profitez des meilleurs taux du marché pour vos projets personnels ou professionnels.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary mb-4">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                        <h5>Traitement rapide</h5>
                        <p class="text-muted">Décision de prêt en 48 heures maximum après réception de votre dossier complet.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary mb-4">
                            <i class="fas fa-user-shield fa-2x"></i>
                        </div>
                        <h5>Accompagnement</h5>
                        <p class="text-muted">Un conseiller dédié vous accompagne tout au long de votre projet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="loan-types py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Nos solutions de prêt</h2>
            <p class="text-muted">Découvrez nos différentes offres adaptées à vos besoins</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="images/i14.png" class="card-img-top" alt="Prêt Personnel">
                    <div class="card-body">
                        <h5 class="card-title">Prêt Personnel</h5>
                        <p class="card-text">Financez vos projets personnels sans justificatif d'utilisation.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-primary me-2"></i> Montant : 1 000 € à 75 000 €</li>
                            <li><i class="fas fa-check text-primary me-2"></i> Durée : 12 à 84 mois</li>
                            <li><i class="fas fa-check text-primary me-2"></i> Taux à partir de 3,9%</li>
                        </ul>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary w-100">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="images/i11.png" class="card-img-top" alt="Prêt Immobilier">
                    <div class="card-body">
                        <h5 class="card-title">Prêt Immobilier</h5>
                        <p class="card-text">Réalisez votre projet immobilier avec nos solutions adaptées.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-primary me-2"></i> Montant : 50 000 € à 1 000 000 €</li>
                            <li><i class="fas fa-check text-primary me-2"></i> Durée : 5 à 25 ans</li>
                            <li><i class="fas fa-check text-primary me-2"></i> Taux à partir de 1,8%</li>
                        </ul>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary w-100">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="images/i16.png" class="card-img-top" alt="Prêt Professionnel">
                    <div class="card-body">
                        <h5 class="card-title">Prêt Professionnel</h5>
                        <p class="card-text">Développez votre entreprise avec nos solutions de financement.</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-primary me-2"></i> Montant : 10 000 € à 500 000 €</li>
                            <li><i class="fas fa-check text-primary me-2"></i> Durée : 12 à 120 mois</li>
                            <li><i class="fas fa-check text-primary me-2"></i> Taux à partir de 2,5%</li>
                        </ul>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary w-100">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonials py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Ils nous ont fait confiance</h2>
            <p class="text-muted">Découvrez ce que nos clients disent de nous</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <div class="me-3">
                                <img src="images/i7.jpg" class="img-fluid rounded-circle h-70 w-70" alt="Client">
                            </div>
                            <div>
                                <h6 class="mb-0">Marie Durant.</h6>
                                <small class="text-muted">Prêt immobilier</small>
                            </div>
                        </div>
                        <p class="card-text">"Un accompagnement personnalisé et des conseils avisés qui m'ont permis d'obtenir mon prêt dans des conditions excellentes."</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <div class="me-3">
                                <img src="images/i21.png" class="img-fluid rounded-circle h-70 w-70" alt="Client">
                            </div>
                            <div>
                                <h6 class="mb-0">Jeanne Pinpond.</h6>
                                <small class="text-muted">Prêt professionnel</small>
                            </div>
                        </div>
                        <p class="card-text">"Rapidité et efficacité pour le financement de mon entreprise. Je recommande vivement FinCorp pour les entrepreneurs."</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <div class="me-3">
                                <img src="images/i16.png" class="img-fluid rounded-circle h-100 w-100" alt="Client">
                            </div>
                            <div>
                                <h6 class="mb-0">Sophie Lusane.</h6>
                                <small class="text-muted">Prêt personnel</small>
                            </div>
                        </div>
                        <p class="card-text">"Service client exceptionnel et conditions très avantageuses. Tout s'est déroulé parfaitement du début à la fin."</p>
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Prêt à réaliser votre projet ?</h2>
        <p class="lead mb-4">Notre équipe est à votre disposition pour vous accompagner dans votre demande de prêt.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('loan.simulator') }}" class="btn btn-light btn-lg">Simuler mon prêt</a>
            <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">Nous contacter</a>
        </div>
    </div>
</section>
@endsection