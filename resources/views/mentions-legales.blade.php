@extends('layouts.app') {{-- Si vous utilisez un layout --}}

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="mb-4 text-center">Mentions Légales - FinCorp</h1>
            
            <div class="card shadow-sm">
                <div class="card-body">
                    <section class="mb-5">
                        <h2 class="h4 text-primary mb-3">1. Éditeur du site</h2>
                        <p>
                            <strong>FinCorp SAS</strong><br>
                            Société par actions simplifiée au capital de 500 000 €<br>
                            RCS Paris 123 456 789<br>
                            N° TVA intracommunautaire : FR 12 3456789<br>
                            Siège social : 123 Avenue des Champs-Élysées, 75008 Paris<br>
                            Téléphone : +33 1 23 45 67 89<br>
                            Email : contact@fincorp.com
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 text-primary mb-3">2. Directeur de publication</h2>
                        <p>
                            Monsieur Jean Dupont, Président de FinCorp SAS
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 text-primary mb-3">3. Hébergement</h2>
                        <p>
                            <strong>OVH SAS</strong><br>
                            2 rue Kellermann - 59100 Roubaix - France
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 text-primary mb-3">4. Activité réglementée</h2>
                        <p>
                            FinCorp est immatriculée en tant qu'intermédiaire en opérations de banque et en services de paiement (IOBSP) sous le numéro 12345, registre ORIAS (www.orias.fr).
                        </p>
                        <p>
                            Les offres de crédit sont soumises à étude et approbation préalable. Le taux pratiqué dépend du profil de l'emprunteur.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 text-primary mb-3">5. Protection des données</h2>
                        <p>
                            Conformément au Règlement Général sur la Protection des Données (RGPD) et à la loi Informatique et Libertés, vous disposez d'un droit d'accès, de rectification, d'opposition et de suppression des données vous concernant.
                        </p>
                        <p>
                            Pour exercer ces droits, veuillez écrire à : dpo@fincorp.com
                        </p>
                        <p>
                            Notre politique de confidentialité est disponible <a href="{{ route('politique-de-confidentialite') }}" class="text-decoration-underline">ici</a>.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 text-primary mb-3">6. Propriété intellectuelle</h2>
                        <p>
                            L'ensemble des éléments du site (textes, images, logos, etc.) sont la propriété exclusive de FinCorp et sont protégés par les lois sur la propriété intellectuelle.
                        </p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 text-primary mb-3">7. Cookies</h2>
                        <p>
                            Ce site utilise des cookies pour améliorer l'expérience utilisateur. Vous pouvez configurer votre navigateur pour les refuser.
                        </p>
                    </section>

                    <section>
                        <h2 class="h4 text-primary mb-3">8. Médiation</h2>
                        <p>
                            En cas de litige, vous pouvez recourir gratuitement au Médiateur de l'Association Française des Intermédiaires en Bancassurance (AFIB) - 11 rue de la Baume, 75008 Paris.
                        </p>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection