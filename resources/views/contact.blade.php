@extends('layouts.app')

@section('content')
<section class="contact-hero py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Contactez-nous</h1>
                <p class="lead">Une question, un projet ? Notre équipe est à votre écoute pour vous accompagner.</p>
            </div>
            <div class="col-lg-6">
                <img src="images/i2.webp" alt="Contact" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<section class="contact-form py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="text-center mb-4">Formulaire de contact</h2>
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nom complet <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Téléphone <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Sujet</label>
                                    <select class="form-select" id="subject" name="subject">
                                        <option value="Demande de prêt">Demande de prêt</option>
                                        <option value="Renseignement">Renseignement</option>
                                        <option value="Simulation">Simulation</option>
                                        <option value="Réclamation">Réclamation</option>
                                        <option value="Autre">Autre</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="loan_amount" class="form-label">Montant souhaité (€)</label>
                                    <input type="number" class="form-control" id="loan_amount" name="loan_amount" min="1000">
                                </div>
                                <div class="col-md-6">
                                    <label for="loan_duration" class="form-label">Durée souhaitée (années)</label>
                                    <input type="number" class="form-control" id="loan_duration" name="loan_duration" min="1" max="30">
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">Votre message <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="consent" name="consent" required>
                                        <label class="form-check-label" for="consent">
                                            J'accepte que mes informations soient utilisées pour traiter ma demande et être recontacté. <span class="text-danger">*</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary w-100 py-3">Envoyer mon message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-info py-5 bg-primary text-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center p-4">
                    <div class="icon-box bg-white text-primary mb-4 mx-auto">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Adresse</h5>
                    <p>123 Avenue des Champs-Élysées<br>75008 Paris, France</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-4">
                    <div class="icon-box bg-white text-primary mb-4 mx-auto">
                        <i class="fas fa-phone-alt fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Téléphone</h5>
                    <p>+33 1 23 45 67 89<br>Lun-Ven : 9h-18h</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-4">
                    <div class="icon-box bg-white text-primary mb-4 mx-auto">
                        <i class="fas fa-envelope fa-2x"></i>
                    </div>
                    <h5 class="mb-3">Email</h5>
                    <p>contact@fincorpfinance.fr<br>support@fincorpfinance.fr</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-map py-9">
    <div class="container">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.9916256937595!2d2.292292615509614!3d48.858370079287475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1623258124295!5m2!1sfr!2sfr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>

<section class="contact-hours py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <h4 class="mb-4">Horaires d'ouverture</h4>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span>Lundi - Vendredi</span>
                                <span>9h00 - 18h00</span>
                            </li>
                            <li class="d-flex justify-content-between py-2 border-bottom">
                                <span>Samedi</span>
                                <span>9h00 - 13h00</span>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span>Dimanche</span>
                                <span>Fermé</span>
                            </li>
                        </ul>
                        <p class="mt-4">Pour les demandes urgentes en dehors des horaires d'ouverture, veuillez utiliser notre formulaire de contact en ligne.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection