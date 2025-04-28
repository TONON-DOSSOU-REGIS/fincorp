@extends('layouts.app')

@section('content')
<section class="faq-hero py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Foire aux questions</h1>
                <p class="lead">Trouvez les réponses aux questions les plus fréquentes sur nos services de prêt.</p>
            </div>
            <div class="col-lg-6">
                <img src="images/i20.png" alt="FAQ" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<section class="faq-content py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item mb-3 border-0 shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Quels sont les documents nécessaires pour une demande de prêt ?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Les documents requis dépendent du type de prêt que vous sollicitez. Voici les documents généralement demandés :</p>
                                <ul>
                                    <li><strong>Pièce d'identité</strong> : carte nationale d'identité ou passeport en cours de validité</li>
                                    <li><strong>Justificatif de domicile</strong> : moins de 3 mois (facture d'électricité, gaz, téléphone, quittance de loyer...)</li>
                                    <li><strong>Justificatifs de revenus</strong> :
                                        <ul>
                                            <li>Salariés : 3 dernières fiches de paie et dernier avis d'imposition</li>
                                            <li>Indépendants : 2 derniers bilans comptables et 2 derniers avis d'imposition</li>
                                            <li>Retraités : dernier avis d'imposition et attestation de pension</li>
                                        </ul>
                                    </li>
                                    <li><strong>Pour un prêt immobilier</strong> : compromis ou promesse de vente, estimation du bien, plan de financement</li>
                                    <li><strong>Pour un prêt auto</strong> : devis ou facture pro-forma du véhicule</li>
                                </ul>
                                <p>Notre conseiller vous précisera la liste exacte des documents à fournir en fonction de votre situation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 border-0 shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Combien de temps prend l'étude de mon dossier ?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Le délai d'étude varie selon le type de prêt et la complexité de votre dossier :</p>
                                <ul>
                                    <li><strong>Prêt personnel</strong> : réponse sous 48 heures en moyenne après réception du dossier complet</li>
                                    <li><strong>Prêt immobilier</strong> : entre 5 et 10 jours ouvrés</li>
                                    <li><strong>Prêt professionnel</strong> : entre 1 et 3 semaines selon le montant et la nature du projet</li>
                                </ul>
                                <p>Nous nous engageons à vous donner une réponse dans les délais les plus courts possibles. Vous pouvez suivre l'avancement de votre demande sur votre espace client ou en contactant votre conseiller.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 border-0 shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Quel est le montant maximum que je peux emprunter ?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Le montant que vous pouvez emprunter dépend de plusieurs facteurs :</p>
                                <ul>
                                    <li>Vos revenus et charges existantes</li>
                                    <li>Votre apport personnel (pour certains types de prêt)</li>
                                    <li>La durée du prêt</li>
                                    <li>Votre historique de crédit</li>
                                </ul>
                                <p>En règle générale :</p>
                                <ul>
                                    <li><strong>Prêt personnel</strong> : jusqu'à 75 000 €</li>
                                    <li><strong>Prêt immobilier</strong> : jusqu'à 1 000 000 € (voire plus pour les dossiers exceptionnels)</li>
                                    <li><strong>Prêt auto</strong> : jusqu'à 100% du prix du véhicule</li>
                                    <li><strong>Prêt professionnel</strong> : jusqu'à 500 000 €</li>
                                </ul>
                                <p>Notre simulateur en ligne vous donne une première estimation, mais seul un examen complet de votre dossier par un conseiller permettra de déterminer le montant exact que vous pouvez emprunter.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 border-0 shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Puis-je rembourser mon prêt par anticipation ?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Oui, la plupart de nos prêts peuvent être remboursés par anticipation, totalement ou partiellement. Cependant, des frais de remboursement anticipé peuvent s'appliquer :</p>
                                <ul>
                                    <li><strong>Prêt immobilier</strong> : frais de 3% du capital restant dû (plafonnés à 6 mois d'intérêts)</li>
                                    <li><strong>Prêt personnel</strong> : frais de 1% du capital remboursé par anticipation</li>
                                    <li><strong>Prêt professionnel</strong> : selon les conditions contractuelles, généralement 2%</li>
                                </ul>
                                <p>Ces frais diminuent avec le temps et disparaissent souvent après une certaine période (généralement 5 à 10 ans pour un prêt immobilier). Nous vous conseillons de contacter votre conseiller pour évaluer l'opportunité d'un remboursement anticipé dans votre situation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 border-0 shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                Quelle est la différence entre taux nominal et TAEG ?
                            </button>
                        </h2>
                        <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Il est important de distinguer ces deux notions :</p>
                                <ul>
                                    <li><strong>Taux nominal</strong> : c'est le taux de base du prêt, utilisé pour calculer les intérêts que vous devez payer. Il ne prend pas en compte les frais annexes.</li>
                                    <li><strong>TAEG (Taux Annuel Effectif Global)</strong> : c'est le coût total du crédit, exprimé en pourcentage annuel du montant emprunté. Il inclut :
                                        <ul>
                                            <li>Le taux nominal</li>
                                            <li>Les frais de dossier</li>
                                            <li>Les frais d'assurance</li>
                                            <li>Les frais de garantie</li>
                                            <li>Tous les autres frais obligatoires</li>
                                        </ul>
                                    </li>
                                </ul>
                                <p>Le TAEG est l'indicateur le plus important pour comparer différentes offres de prêt, car il reflète le coût réel du crédit. La réglementation impose aux établissements de crédit d'afficher clairement le TAEG dans toutes leurs communications.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 border-0 shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                L'assurance emprunteur est-elle obligatoire ?
                            </button>
                        </h2>
                        <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>L'assurance emprunteur n'est pas légalement obligatoire, mais dans la pratique, la quasi-totalité des établissements de crédit l'exigent pour accorder un prêt, notamment pour les prêts immobiliers.</p>
                                <p>Cette assurance couvre généralement :</p>
                                <ul>
                                    <li><strong>Le décès</strong> : le capital restant dû est remboursé</li>
                                    <li><strong>L'incapacité temporaire ou permanente de travail</strong> : prise en charge des mensualités</li>
                                    <li><strong>La perte d'emploi</strong> (optionnelle) : prise en charge temporaire des mensualités</li>
                                </ul>
                                <p>Depuis la loi Lemoine, vous avez la possibilité de souscrire une assurance emprunteur auprès de l'assureur de votre choix, à condition qu'elle offre des garanties équivalentes à celles proposées par l'assurance groupe de l'établissement prêteur. Cette "délégation d'assurance" peut vous permettre de réaliser des économies importantes.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 border-0 shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                Que se passe-t-il si je ne peux plus rembourser mon prêt ?
                            </button>
                        </h2>
                        <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>Si vous rencontrez des difficultés pour rembourser votre prêt, il est essentiel de contacter rapidement votre conseiller FinCorp pour trouver une solution ensemble. Plusieurs options sont possibles :</p>
                                <ul>
                                    <li><strong>Report d'échéances</strong> : suspension temporaire des remboursements (généralement 3 à 12 mois)</li>
                                    <li><strong>Allongement de la durée du prêt</strong> : pour réduire le montant des mensualités</li>
                                    <li><strong>Réaménagement du prêt</strong> : modification des conditions initiales</li>
                                    <li><strong>Rachat de crédit</strong> : regroupement de vos crédits en un seul avec une mensualité unique réduite</li>
                                </ul>
                                <p>Dans tous les cas, nous vous conseillons de :</p>
                                <ol>
                                    <li>Ne pas ignorer les relances</li>
                                    <li>Documenter vos difficultés (justificatifs de perte d'emploi, arrêt maladie...)</li>
                                    <li>Étudier toutes les solutions avec votre conseiller</li>
                                </ol>
                                <p>Notre objectif est de trouver avec vous une solution adaptée à votre situation pour éviter les incidents de paiement.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 shadow-sm">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                                Puis-je obtenir un prêt avec un fichage Banque de France ?
                            </button>
                        </h2>
                        <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p>L'obtention d'un prêt lorsque vous êtes fiché à la Banque de France (FICP ou FCC) est plus difficile mais pas impossible. Tout dépend :</p>
                                <ul>
                                    <li>De la nature du fichage (incident de paiement, surendettement...)</li>
                                    <li>De l'ancienneté du fichage</li>
                                    <li>De votre situation actuelle (revenus stables, apport...)</li>
                                    <li>Du type de prêt sollicité</li>
                                </ul>
                                <p>Nous étudions chaque dossier au cas par cas. Dans certains cas, des solutions sont possibles :</p>
                                <ul>
                                    <li>Prêt avec garant (caution solidaire)</li>
                                    <li>Prêt avec apport important</li>
                                    <li>Prêt de montant modeste pour reconstituer un historique de crédit</li>
                                </ul>
                                <p>Nous vous invitons à prendre rendez-vous avec un de nos conseillers qui pourra analyser précisément votre situation et vous dire quelles solutions sont envisageables.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="faq-cta py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Vous ne trouvez pas réponse à votre question ?</h2>
        <p class="lead mb-4">Notre équipe est à votre disposition pour vous renseigner.</p>
        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Contactez-nous</a>
    </div>
</section>
@endsection