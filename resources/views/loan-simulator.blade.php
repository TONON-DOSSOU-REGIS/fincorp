@extends('layouts.app')

@section('content')
@section('scripts')
    @parent
    <script src="{{ asset('js/loan-simulator.js') }}" defer></script>
@endsection

<section class="simulator-hero py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Simulateur de prêt</h1>
                <p class="lead">Estimez vos mensualités et le coût total de votre emprunt en quelques clics.</p>
            </div>
            <div class="col-lg-6">
                <img src="images/i9.jpg" alt="Simulateur" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<section class="simulator-form py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="text-center mb-4">Simulez votre prêt</h2>
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
                                    <label for="loanAmount" class="form-label">Montant du prêt (€)</label>
                                    <input type="range" class="form-range" id="loanAmountRange" 
                                           min="1000" max="100000" step="1000" value="{{ $defaultAmount }}">
                                    <input type="number" class="form-control mt-2" id="loanAmount" name="amount" 
                                           min="1000" max="1000000" value="{{ $defaultAmount }}" step="100">
                                    <div class="form-text">Entre 1 000 € et 1 000 000 €</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="loanDuration" class="form-label">Durée (années)</label>
                                    <input type="range" class="form-range" id="loanDurationRange" 
                                           min="1" max="30" value="{{ $defaultDuration }}">
                                    <input type="number" class="form-control mt-2" id="loanDuration" name="duration" 
                                           min="1" max="30" value="{{ $defaultDuration }}">
                                    <div class="form-text">Entre 1 et 30 ans</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="interestRate" class="form-label">Taux d'intérêt (%)</label>
                                    <input type="range" class="form-range" id="interestRateRange" 
                                           min="0.1" max="20" step="0.1" value="{{ $defaultRate }}">
                                    <input type="number" class="form-control mt-2" id="interestRate" name="interest_rate" 
                                           min="0.1" max="20" step="0.01" value="{{ $defaultRate }}">
                                    <div class="form-text">Entre 0.1% et 20%</div>
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
                            <h5 class="mb-3">Estimation</h5>
                            <div class="row g-3 text-center">
                                <div class="col-md-4">
                                    <div class="p-3 bg-primary bg-opacity-10 rounded">
                                        <h6 class="text-muted">Mensualité</h6>
                                        <h4 class="text-primary" id="rtMonthlyPayment">-</h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 bg-primary bg-opacity-10 rounded">
                                        <h6 class="text-muted">Coût total</h6>
                                        <h4 class="text-primary" id="rtTotalInterest">-</h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 bg-primary bg-opacity-10 rounded">
                                        <h6 class="text-muted">Total à rembourser</h6>
                                        <h4 class="text-primary" id="rtTotalPayment">-</h4>
                                    </div>
                                </div>
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
                        <h2 class="text-center mb-4">Résultats détaillés de votre simulation</h2>
                        <div class="row g-4 text-center mb-5">
                            <div class="col-md-4">
                                <div class="p-3 bg-primary bg-opacity-10 rounded">
                                    <h6 class="text-muted">Mensualité</h6>
                                    <h3 class="text-primary" id="monthlyPayment">-</h3>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 bg-primary bg-opacity-10 rounded">
                                    <h6 class="text-muted">Coût total du crédit</h6>
                                    <h3 class="text-primary" id="totalInterest">-</h3>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 bg-primary bg-opacity-10 rounded">
                                    <h6 class="text-muted">Montant total</h6>
                                    <h3 class="text-primary" id="totalPayment">-</h3>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h5 class="mb-3">Tableau d'amortissement</h5>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Période</th>
                                            <th>Capital restant</th>
                                            <th>Intérêts</th>
                                            <th>Capital remboursé</th>
                                            <th>Mensualité</th>
                                        </tr>
                                    </thead>
                                    <tbody id="amortizationTable">
                                        <!-- Les lignes seront ajoutées dynamiquement -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <a href="{{ route('contact') }}" class="btn btn-primary px-4 py-2 me-3">
                                <i class="fas fa-paper-plane me-2"></i>Demander ce prêt
                            </a>
                            <button id="printResults" class="btn btn-outline-secondary px-4 py-2">
                                <i class="fas fa-print me-2"></i>Imprimer la simulation
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection