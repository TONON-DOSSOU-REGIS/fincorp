@extends('layouts.app')

@section('content')
@section('scripts')
    @parent
    <script src="{{ asset('js/loan-simulator.js') }}" defer></script>
    <style>
        /* Style personnalisé pour les sliders */
        input[type="range"] {
            -webkit-appearance: none;
            width: 100%;
            height: 8px;
            border-radius: 4px;
            background: #dee2e6;
            outline: none;
            margin-top: 10px;
        }
        
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #0d6efd;
            cursor: pointer;
            position: relative;
        }
        
        input[type="range"]::-moz-range-thumb {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #0d6efd;
            cursor: pointer;
        }
        
        /* Bulle pour les sliders */
        input[type="range"] {
            position: relative;
        }
        
        input[type="range"]::after {
            content: attr(--value);
            position: absolute;
            top: -35px;
            left: 50%;
            transform: translateX(-50%);
            background: #0d6efd;
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }
        
        /* Style pour le tableau d'amortissement */
        .amortization-table tr:nth-child(6),
        .amortization-table tr:nth-last-child(6) {
            border-bottom: 2px dashed #dee2e6;
        }
        
        @media print {
            .no-print {
                display: none !important;
            }
            
            body {
                background: white !important;
                color: black !important;
                font-size: 12pt;
            }
            
            .card {
                border: none !important;
                box-shadow: none !important;
            }
            
            .table {
                font-size: 10pt;
            }
        }
    </style>
@endsection

<section class="simulator-hero py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Simulateur de prêt intelligent</h1>
                <p class="lead">Calculez instantanément vos mensualités, le coût total et visualisez le tableau d'amortissement complet.</p>
                <div class="d-flex gap-3 mt-4">
                    <a href="#simulator" class="btn btn-primary px-4 py-2">
                        <i class="fas fa-calculator me-2"></i>Essayer le simulateur
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-primary px-4 py-2">
                        <i class="fas fa-headset me-2"></i>Contactez un conseiller
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/i12.jpg') }}" alt="Simulateur de prêt" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<section id="simulator" class="simulator-form py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="text-center mb-4">Simulez votre prêt en 1 minute</h2>
                        <form id="loanSimulatorForm">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="loanType" class="form-label">Type de prêt</label>
                                    <select class="form-select" id="loanType" name="loan_type">
                                        @foreach($loanTypes as $value => $label)
                                            <option value="{{ $value }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="loanAmount" class="form-label">Montant du prêt</label>
                                    <input type="range" class="form-range" id="loanAmountRange" 
                                           min="{{ $minAmount ?? 1000 }}" max="{{ $maxAmount ?? 100000 }}" 
                                           step="500" value="{{ $defaultAmount ?? 10000 }}">
                                    <input type="number" class="form-control mt-2" id="loanAmount" name="amount" 
                                           min="{{ $minAmount ?? 1000 }}" max="{{ $maxAmount ?? 1000000 }}" 
                                           value="{{ $defaultAmount ?? 10000 }}" step="100">
                                    <div class="form-text">Entre {{ number_format($minAmount ?? 1000, 0, ',', ' ') }} € et {{ number_format($maxAmount ?? 1000000, 0, ',', ' ') }} €</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="loanDuration" class="form-label">Durée de remboursement</label>
                                    <input type="range" class="form-range" id="loanDurationRange" 
                                           min="{{ $minDuration ?? 1 }}" max="{{ $maxDuration ?? 30 }}" 
                                           value="{{ $defaultDuration ?? 5 }}">
                                    <input type="number" class="form-control mt-2" id="loanDuration" name="duration" 
                                           min="{{ $minDuration ?? 1 }}" max="{{ $maxDuration ?? 30 }}" 
                                           value="{{ $defaultDuration ?? 5 }}">
                                    <div class="form-text">Entre {{ $minDuration ?? 1 }} et {{ $maxDuration ?? 30 }} ans</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="interestRate" class="form-label">Taux d'intérêt annuel</label>
                                    <input type="range" class="form-range" id="interestRateRange" 
                                           min="{{ $minRate ?? 0.1 }}" max="{{ $maxRate ?? 20 }}" 
                                           step="0.1" value="{{ $defaultRate ?? 3.5 }}">
                                    <input type="number" class="form-control mt-2" id="interestRate" name="interest_rate" 
                                           min="{{ $minRate ?? 0.1 }}" max="{{ $maxRate ?? 20 }}" 
                                           step="0.01" value="{{ $defaultRate ?? 3.5 }}">
                                    <div class="form-text">Entre {{ $minRate ?? 0.1 }}% et {{ $maxRate ?? 20 }}%</div>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary w-100 py-3">
                                        <span id="submitText">Calculer mon prêt</span>
                                        <div id="submitSpinner" class="spinner-border spinner-border-sm d-none" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                        <!-- Résultats en temps réel -->
                        <div class="mt-5 pt-4 border-top" id="realTimeResults" style="display: none;">
                            <h5 class="mb-3">Estimation instantanée</h5>
                            <div class="row g-3 text-center">
                                <div class="col-md-3">
                                    <div class="p-3 bg-primary bg-opacity-10 rounded h-100">
                                        <h6 class="text-muted">Mensualité estimée</h6>
                                        <h4 class="text-primary" id="rtMonthlyPayment">-</h4>
                                        <small class="text-muted">(hors assurance)</small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 bg-primary bg-opacity-10 rounded h-100">
                                        <h6 class="text-muted">Coût des intérêts</h6>
                                        <h4 class="text-primary" id="rtTotalInterest">-</h4>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 bg-primary bg-opacity-10 rounded h-100">
                                        <h6 class="text-muted">Coût de l'assurance</h6>
                                        <h4 class="text-primary" id="rtInsurance">-</h4>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 bg-primary bg-opacity-10 rounded h-100">
                                        <h6 class="text-muted">Total à rembourser</h6>
                                        <h4 class="text-primary" id="rtTotalPayment">-</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-info mt-3 mb-0">
                                <i class="fas fa-info-circle me-2"></i>
                                Cette estimation est indicative. Pour une simulation précise, validez le formulaire.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="simulator-results py-5 bg-light" id="resultsSection" style="display: none;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="mb-0">Résultats détaillés de votre simulation</h2>
                            <button id="printResults" class="btn btn-outline-secondary no-print">
                                <i class="fas fa-print me-2"></i>Imprimer
                            </button>
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <h5 class="mb-3">Paramètres du prêt</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><strong>Type :</strong> <span id="loanTypeResult">-</span></li>
                                        <li class="mb-2"><strong>Montant :</strong> <span id="amountResult">-</span></li>
                                        <li class="mb-2"><strong>Durée :</strong> <span id="durationResult">-</span></li>
                                        <li><strong>Taux annuel :</strong> <span id="rateResult">-</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded h-100">
                                    <h5 class="mb-3">Synthèse</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><strong>Mensualité :</strong> <span id="monthlyPayment">-</span></li>
                                        <li class="mb-2"><small>(dont assurance : <span id="monthlyInsurance">-</span>)</small></li>
                                        <li class="mb-2"><strong>Coût total des intérêts :</strong> <span id="totalInterest">-</span></li>
                                        <li class="mb-2"><strong>Coût total de l'assurance :</strong> <span id="totalInsurance">-</span></li>
                                        <li><strong>Montant total à rembourser :</strong> <span id="totalPayment">-</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Tableau d'amortissement</h5>
                                <small class="text-muted">Extrait des premières et dernières échéances</small>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover amortization-table">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Période</th>
                                            <th>Capital restant</th>
                                            <th>Intérêts</th>
                                            <th>Capital remboursé</th>
                                            <th>Assurance</th>
                                            <th>Mensualité</th>
                                        </tr>
                                    </thead>
                                    <tbody id="amortizationTable">
                                        <!-- Les lignes seront ajoutées dynamiquement -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="mt-5 text-center no-print">
                            <a href="{{ route('contact') }}" class="btn btn-primary px-4 py-2 me-3">
                                <i class="fas fa-paper-plane me-2"></i>Demander ce prêt
                            </a>
                            <button onclick="window.location.reload()" class="btn btn-outline-primary px-4 py-2">
                                <i class="fas fa-redo me-2"></i>Nouvelle simulation
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection