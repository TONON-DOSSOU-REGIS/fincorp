@extends('layouts.app')

@section('content')
<section class="services-hero py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Nos services financiers</h1>
                <p class="lead">Des solutions adaptées à chaque projet, avec des conditions avantageuses et un accompagnement personnalisé.</p>
            </div>
            <div class="col-lg-6">
                <img src="images/i3.jpg" alt="Services" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<section class="services-list py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary mb-4">
                            <i class="fas fa-home fa-2x"></i>
                        </div>
                        <h4 class="mb-3">Prêts Immobiliers</h4>
                        <p>Financez votre résidence principale, secondaire ou un investissement locatif avec nos solutions adaptées.</p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Taux compétitifs</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Durée jusqu'à 25 ans</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Prêt jusqu'à 100% du projet</li>
                            <li><i class="fas fa-check-circle text-primary me-2"></i> Assurance emprunteur adaptée</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary mt-3">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary mb-4">
                            <i class="fas fa-user fa-2x"></i>
                        </div>
                        <h4 class="mb-3">Prêts Personnels</h4>
                        <p>Réalisez vos projets personnels sans justificatif d'utilisation et avec des mensualités fixes.</p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> De 1 000 € à 75 000 €</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Durée de 12 à 84 mois</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Taux fixe dès 3,9%</li>
                            <li><i class="fas fa-check-circle text-primary me-2"></i> Sans frais de dossier</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary mt-3">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary mb-4">
                            <i class="fas fa-briefcase fa-2x"></i>
                        </div>
                        <h4 class="mb-3">Prêts Professionnels</h4>
                        <p>Développez votre entreprise avec nos solutions de financement adaptées aux professionnels.</p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Création ou développement d'entreprise</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Trésorerie et fonds de roulement</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Investissements matériels</li>
                            <li><i class="fas fa-check-circle text-primary me-2"></i> Prêts garantis par Bpifrance</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary mt-3">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary mb-4">
                            <i class="fas fa-car fa-2x"></i>
                        </div>
                        <h4 class="mb-3">Crédits Auto/Moto</h4>
                        <p>Financez votre véhicule neuf ou d'occasion avec des solutions adaptées à votre budget.</p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Taux à partir de 2,9%</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Durée jusqu'à 84 mois</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Prêt jusqu'à 100% du véhicule</li>
                            <li><i class="fas fa-check-circle text-primary me-2"></i> Assurance optionnelle</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary mt-3">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary mb-4">
                            <i class="fas fa-graduation-cap fa-2x"></i>
                        </div>
                        <h4 class="mb-3">Prêts Étudiants</h4>
                        <p>Financez vos études ou celles de vos enfants avec des conditions adaptées aux étudiants.</p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Sans garantie parentale</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Différé de remboursement possible</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Taux préférentiels</li>
                            <li><i class="fas fa-check-circle text-primary me-2"></i> Assurance incluse</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary mt-3">En savoir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary mb-4">
                            <i class="fas fa-balance-scale fa-2x"></i>
                        </div>
                        <h4 class="mb-3">Rachat de Crédits</h4>
                        <p>Regroupez vos crédits pour alléger vos mensualités et mieux maîtriser votre budget.</p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Jusqu'à -50% sur vos mensualités</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Regroupement de tous types de crédits</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Durée adaptée à votre situation</li>
                            <li><i class="fas fa-check-circle text-primary me-2"></i> Étude gratuite et sans engagement</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary mt-3">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services-process py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Comment obtenir votre prêt ?</h2>
            <p class="text-muted">Un processus simple et transparent en 4 étapes</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="step-number bg-primary text-white mb-4">1</div>
                        <h5>Simulation</h5>
                        <p class="text-muted">Utilisez notre simulateur en ligne ou contactez-nous pour une étude personnalisée.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="step-number bg-primary text-white mb-4">2</div>
                        <h5>Dépôt de dossier</h5>
                        <p class="text-muted">Transmettez-nous les documents nécessaires pour l'étude de votre demande.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="step-number bg-primary text-white mb-4">3</div>
                        <h5>Étude et réponse</h5>
                        <p class="text-muted">Notre équipe analyse votre dossier et vous fait une proposition sous 48h.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="step-number bg-primary text-white mb-4">4</div>
                        <h5>Déblocage des fonds</h5>
                        <p class="text-muted">Après acceptation, les fonds sont débloqués selon les modalités convenues.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services-cta py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Prêt à démarrer votre projet ?</h2>
        <p class="lead mb-4">Notre équipe est à votre disposition pour étudier votre demande.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('loan.simulator') }}" class="btn btn-light btn-lg">Simuler mon prêt</a>
            <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">Nous contacter</a>
        </div>
    </div>
</section>
@endsection