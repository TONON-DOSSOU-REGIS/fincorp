@extends('layouts.app')

@section('content')
<div class="container py-5 legal-page">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h1 class="h2 mb-0">Politique de Confidentialité - FinCorp</h1>
                    <p class="mb-0">Dernière mise à jour : {{ now()->format('d/m/Y') }}</p>
                </div>
                
                <div class="card-body">
                    <section class="mb-5">
                        <h2 class="h4 text-primary mb-3">1. Introduction</h2>
                        <p>FinCorp SAS (« nous », « notre ») s'engage à protéger la confidentialité de vos données personnelles conformément au Règlement Général sur la Protection des Données (RGPD) et à la loi Informatique et Libertés.</p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 text-primary mb-3">2. Données collectées</h2>
                        <p>Nous pouvons collecter :</p>
                        <ul>
                            <li>Identité (nom, prénom, date de naissance)</li>
                            <li>Coordonnées (adresse, email, téléphone)</li>
                            <li>Données financières (revenus, situation professionnelle)</li>
                            <li>Données de connexion (adresse IP, logs)</li>
                            <li>Documents d'identité pour les demandes de crédit</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 text-primary mb-3">3. Finalités du traitement</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Finalité</th>
                                        <th>Base légale</th>
                                        <th>Durée de conservation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Instruction des demandes de crédit</td>
                                        <td>Exécution contractuelle</td>
                                        <td>5 ans après la fin de la relation</td>
                                    </tr>
                                    <tr>
                                        <td>Conformité légale (KYC, LCB-FT)</td>
                                        <td>Obligation légale</td>
                                        <td>10 ans</td>
                                    </tr>
                                    <tr>
                                        <td>Marketing (avec consentement)</td>
                                        <td>Consentement</td>
                                        <td>3 ans après dernier contact</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 text-primary mb-3">4. Destinataires des données</h2>
                        <p>Vos données peuvent être transmises à :</p>
                        <ul>
                            <li>Nos partenaires bancaires pour l'octroi de crédit</li>
                            <li>Prestataires techniques (hébergeurs, éditeurs logiciels)</li>
                            <li>Autorités réglementaires (ACPR, Banque de France)</li>
                            <li>Services judiciaires sur réquisition</li>
                        </ul>
                        <div class="alert alert-info mt-3">
                            <i class="fas fa-info-circle me-2"></i>
                            Les transferts hors UE font l'objet de clauses contractuelles types de la Commission européenne.
                        </div>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 text-primary mb-3">5. Sécurité des données</h2>
                        <p>Nous mettons en œuvre :</p>
                        <ul>
                            <li>Chiffrement SSL/TLS des communications</li>
                            <li>Hébergement certifié ISO 27001</li>
                            <li>Contrôles d'accès stricts</li>
                            <li>Journalisation des accès</li>
                        </ul>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 text-primary mb-3">6. Vos droits</h2>
                        <p>Conformément au RGPD, vous disposez des droits suivants :</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex mb-3">
                                    <div class="me-3 text-primary">
                                        <i class="fas fa-check-circle fa-2x"></i>
                                    </div>
                                    <div>
                                        <h5 class="h6 mb-1">Droit d'accès</h5>
                                        <p class="small">Obtenir une copie de vos données</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex mb-3">
                                    <div class="me-3 text-primary">
                                        <i class="fas fa-edit fa-2x"></i>
                                    </div>
                                    <div>
                                        <h5 class="h6 mb-1">Droit de rectification</h5>
                                        <p class="small">Corriger des données inexactes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex mb-3">
                                    <div class="me-3 text-primary">
                                        <i class="fas fa-trash-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h5 class="h6 mb-1">Droit à l'effacement</h5>
                                        <p class="small">Supprimer vos données (« droit à l'oubli »)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex mb-3">
                                    <div class="me-3 text-primary">
                                        <i class="fas fa-ban fa-2x"></i>
                                    </div>
                                    <div>
                                        <h5 class="h6 mb-1">Droit d'opposition</h5>
                                        <p class="small">S'opposer au traitement marketing</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>Pour exercer ces droits :</p>
                        <ul>
                            <li>Email : <a href="mailto:dpo@fincorp.com">contact@fincorpfinance.fr</a></li>
                            <li>Courrier : DPO FinCorp - 123 Avenue des Champs-Élysées, 75008 Paris</li>
                        </ul>
                        <p>Pièce justificative d'identité requise. Réponse sous 1 mois.</p>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 text-primary mb-3">7. Cookies</h2>
                        <p>Nous utilisons :</p>
                        <ul>
                            <li>Cookies techniques (nécessaires au fonctionnement)</li>
                            <li>Cookies analytiques (Google Analytics anonymisé)</li>
                            <li>Cookies de préférences</li>
                        </ul>
                        <div class="alert alert-warning">
                            <i class="fas fa-cookie-bite me-2"></i>
                            Vous pouvez configurer les cookies via notre <a href="#" class="alert-link">bannière de consentement</a> ou dans les paramètres de votre navigateur.
                        </div>
                    </section>

                    <section class="mb-5">
                        <h2 class="h4 text-primary mb-3">8. Modifications</h2>
                        <p>Cette politique peut être mise à jour. Nous vous informerons des changements substantiels par email ou via un avis sur notre site.</p>
                    </section>

                    <section>
                        <h2 class="h4 text-primary mb-3">9. Contact</h2>
                        <p>Délégué à la Protection des Données :</p>
                        <address>
                            <strong>Mme Sophie Martin</strong><br>
                            Email : <a href="mailto:contact@fincorpfinance.fr">dpo@fincorp.com</a><br>
                            Téléphone : +33 1 23 45 67 89 (poste 123)
                        </address>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .legal-page {
        font-size: 1.05rem;
        line-height: 1.6;
    }
    .legal-page h2 {
        border-bottom: 2px solid #e9ecef;
        padding-bottom: 8px;
    }
    .card-header {
        border-radius: 0.375rem 0.375rem 0 0 !important;
    }
</style>
@endpush