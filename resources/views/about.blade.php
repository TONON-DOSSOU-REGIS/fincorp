@extends('layouts.app')

@section('content')
<section class="about-hero py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">À propos de FinCorp</h1>
                <p class="lead">Notre engagement : vous accompagner dans la réalisation de vos projets avec des solutions de financement adaptées.</p>
            </div>
            <div class="col-lg-6">
                <img src="images/i4.png" alt="À propos" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<section class="about-mission py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-lg-2">
                <h2 class="fw-bold mb-4">Notre mission</h2>
                <p>Depuis notre création en 2010, FinCorp s'engage à fournir des solutions de financement accessibles, transparentes et adaptées aux besoins de chacun.</p>
                <p>Nous croyons que chaque projet mérite d'être réalisé, qu'il s'agisse d'acheter une maison, de financer des études ou de développer une entreprise.</p>
                <p>Notre approche personnalisée et notre expertise nous permettent de proposer des solutions sur mesure avec des conditions avantageuses.</p>
            </div>
            <div class="col-lg-6 order-lg-1">
                <img src="images/i5.jpg" alt="Mission" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<section class="about-values py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Nos valeurs</h2>
            <p class="text-muted">Les principes qui guident nos actions au quotidien</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary mb-4">
                            <i class="fas fa-hand-holding-heart fa-2x"></i>
                        </div>
                        <h5>Transparence</h5>
                        <p class="text-muted">Des informations claires et des engagements honnêtes. Pas de frais cachés, pas de surprises.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary mb-4">
                            <i class="fas fa-user-tie fa-2x"></i>
                        </div>
                        <h5>Expertise</h5>
                        <p class="text-muted">Une équipe de professionnels expérimentés pour vous conseiller et vous guider dans vos choix.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box bg-primary bg-opacity-10 text-primary mb-4">
                            <i class="fas fa-bullseye fa-2x"></i>
                        </div>
                        <h5>Engagement</h5>
                        <p class="text-muted">Nous nous engageons à trouver la solution la plus adaptée à votre situation et à vos projets.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-team py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Notre équipe</h2>
            <p class="text-muted">Des professionnels à votre service</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <img src="images/i10.jpg" class="card-img-top" alt="Équipe">
                    <div class="card-body text-center">
                        <h5 class="card-title">Angelina Deschamps</h5>
                        <p class="text-muted">Directeur Général</p>
                        <p class="card-text">20 ans d'expérience dans le secteur bancaire et financier.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <img src="images/i18.png" class="card-img-top" alt="Équipe">
                    <div class="card-body text-center">
                        <h5 class="card-title">Sophie Lambert</h5>
                        <p class="text-muted">Responsable Prêts Immobiliers</p>
                        <p class="card-text">Spécialiste en financement immobilier depuis 15 ans.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <img src="images/i17.png" class="card-img-top" alt="Équipe">
                    <div class="card-body text-center">
                        <h5 class="card-title">Alexandra Dubois</h5>
                        <p class="text-muted">Responsable Prêts Professionnels</p>
                        <p class="card-text">Expert en financement d'entreprise et accompagnement des entrepreneurs.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-cta py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Vous avez des questions sur nos services ?</h2>
        <p class="lead mb-4">Notre équipe est à votre disposition pour vous renseigner.</p>
        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Contactez-nous</a>
    </div>
</section>
@endsection