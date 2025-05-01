document.addEventListener('DOMContentLoaded', function() {
    // Éléments du DOM
    const form = document.getElementById('loanSimulatorForm');
    const realTimeResults = document.getElementById('realTimeResults');
    const resultsSection = document.getElementById('resultsSection');
    const submitBtn = form.querySelector('button[type="submit"]');
    const submitText = submitBtn.querySelector('#submitText');
    const submitSpinner = submitBtn.querySelector('#submitSpinner');
    
    // Sliders et inputs
    const amountRange = document.getElementById('loanAmountRange');
    const amountInput = document.getElementById('loanAmount');
    const durationRange = document.getElementById('loanDurationRange');
    const durationInput = document.getElementById('loanDuration');
    const rateRange = document.getElementById('interestRateRange');
    const rateInput = document.getElementById('interestRate');
    const loanTypeSelect = document.getElementById('loanType');
    
    // Valeurs limites
    const minAmount = parseInt(amountRange.min) || 1000;
    const maxAmount = parseInt(amountRange.max) || 1000000;
    const minDuration = parseInt(durationRange.min) || 1;
    const maxDuration = parseInt(durationRange.max) || 30;
    const minRate = parseFloat(rateRange.min) || 0.1;
    const maxRate = parseFloat(rateRange.max) || 20;
    
    // Formatage des valeurs des sliders
    function formatSliderValue(value, type) {
        if (type === 'amount') {
            return new Intl.NumberFormat('fr-FR').format(value) + ' €';
        } else if (type === 'duration') {
            return value + ' an' + (value > 1 ? 's' : '');
        } else if (type === 'rate') {
            return value.toFixed(1) + '%';
        }
        return value;
    }
    
    // Mise à jour des bulles des sliders
    function updateSliderBubbles() {
        amountRange.style.setProperty('--value', formatSliderValue(amountRange.value, 'amount'));
        durationRange.style.setProperty('--value', formatSliderValue(durationRange.value, 'duration'));
        rateRange.style.setProperty('--value', formatSliderValue(parseFloat(rateRange.value), 'rate'));
    }
    
    // Synchronisation des sliders et inputs
    function syncInputs() {
        amountInput.value = amountRange.value;
        durationInput.value = durationRange.value;
        rateInput.value = rateRange.value;
        calculateRealTime();
    }
    
    // Écouteurs d'événements
    amountRange.addEventListener('input', syncInputs);
    amountInput.addEventListener('input', function() {
        let value = Math.min(Math.max(this.value, minAmount), maxAmount);
        this.value = value;
        amountRange.value = value;
        calculateRealTime();
    });
    
    durationRange.addEventListener('input', syncInputs);
    durationInput.addEventListener('input', function() {
        let value = Math.min(Math.max(this.value, minDuration), maxDuration);
        this.value = value;
        durationRange.value = value;
        calculateRealTime();
    });
    
    rateRange.addEventListener('input', syncInputs);
    rateInput.addEventListener('input', function() {
        let value = Math.min(Math.max(this.value, minRate), maxRate);
        this.value = value;
        rateRange.value = value;
        calculateRealTime();
    });
    
    loanTypeSelect.addEventListener('change', function() {
        // Ajustement automatique des taux selon le type de prêt
        const loanType = this.value;
        let suggestedRate = 4.5; // Taux par défaut
        
        switch(loanType) {
            case 'mortgage': suggestedRate = 3.5; break;
            case 'auto': suggestedRate = 5.0; break;
            case 'professional': suggestedRate = 6.0; break;
            case 'student': suggestedRate = 2.0; break;
        }
        
        rateInput.value = suggestedRate;
        rateRange.value = suggestedRate;
        calculateRealTime();
        updateSliderBubbles();
    });
    
    // Calcul en temps réel
    function calculateRealTime() {
        const amount = parseFloat(amountInput.value) || 0;
        const duration = parseInt(durationInput.value) || 1;
        const annualRate = parseFloat(rateInput.value) || 0.1;
        const loanType = loanTypeSelect.value;
        
        if (amount < minAmount || amount > maxAmount || 
            duration < minDuration || duration > maxDuration || 
            annualRate < minRate || annualRate > maxRate) {
            return;
        }
        
        const monthlyRate = annualRate / 100 / 12;
        const term = duration * 12;
        
        let monthlyPayment;
        if (monthlyRate === 0) {
            monthlyPayment = amount / term;
        } else {
            monthlyPayment = (amount * monthlyRate) / (1 - Math.pow(1 + monthlyRate, -term));
        }
        
        // Estimation de l'assurance (0.3% par défaut)
        const insuranceRate = 0.3;
        const monthlyInsurance = (amount * insuranceRate) / 12 / 100;
        const totalMonthlyPayment = monthlyPayment + monthlyInsurance;
        
        const totalPayment = totalMonthlyPayment * term;
        const totalInterest = monthlyPayment * term - amount;
        const totalInsurance = monthlyInsurance * term;
        
        // Afficher les résultats en temps réel
        document.getElementById('rtMonthlyPayment').textContent = formatCurrency(totalMonthlyPayment);
        document.getElementById('rtTotalInterest').textContent = formatCurrency(totalInterest);
        document.getElementById('rtTotalPayment').textContent = formatCurrency(totalPayment);
        document.getElementById('rtInsurance').textContent = formatCurrency(totalInsurance);
        
        realTimeResults.style.display = 'block';
        updateSliderBubbles();
    }
    
    // Soumission du formulaire
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        submitText.textContent = 'Calcul en cours...';
        submitSpinner.classList.remove('d-none');
        submitBtn.disabled = true;
        
        const formData = new FormData(form);
        const data = {
            amount: parseFloat(formData.get('amount')),
            duration: parseInt(formData.get('duration')),
            interest_rate: parseFloat(formData.get('interest_rate')),
            loan_type: formData.get('loan_type'),
            _token: formData.get('_token')
        };
        
        fetch("{{ route('loan.calculate') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': data._token
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            if (!response.ok) throw new Error('Erreur réseau');
            return response.json();
        })
        .then(data => {
            if (data.success) {
                displayResults(data);
                resultsSection.style.display = 'block';
                window.scrollTo({
                    top: resultsSection.offsetTop - 20,
                    behavior: 'smooth'
                });
            } else {
                throw new Error(data.message || 'Calcul échoué');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('Une erreur est survenue. Veuillez vérifier vos données.', 'danger');
        })
        .finally(() => {
            submitText.textContent = 'Calculer mon prêt';
            submitSpinner.classList.add('d-none');
            submitBtn.disabled = false;
        });
    });
    
    // Afficher les résultats détaillés
    function displayResults(data) {
        document.getElementById('loanTypeResult').textContent = 
            document.querySelector(`#loanType option[value="${data.loan_type}"]`).textContent;
        document.getElementById('amountResult').textContent = formatCurrency(data.amount);
        document.getElementById('durationResult').textContent = data.duration + ' an' + (data.duration > 1 ? 's' : '');
        document.getElementById('rateResult').textContent = data.annual_rate.toFixed(2) + '%';
        
        document.getElementById('monthlyPayment').textContent = formatCurrency(data.monthly_payment);
        document.getElementById('monthlyPaymentWithoutInsurance').textContent = formatCurrency(data.monthly_payment_without_insurance);
        document.getElementById('monthlyInsurance').textContent = formatCurrency(data.monthly_insurance);
        document.getElementById('totalInterest').textContent = formatCurrency(data.total_interest);
        document.getElementById('totalInsurance').textContent = formatCurrency(data.total_insurance);
        document.getElementById('totalPayment').textContent = formatCurrency(data.total_payment);
        
        const tableBody = document.getElementById('amortizationTable');
        tableBody.innerHTML = '';
        
        data.amortization.forEach(item => {
            const row = document.createElement('tr');
            
            let period;
            if (item.month <= 12) {
                period = `Mois ${item.month}`;
            } else {
                const years = Math.floor(item.month / 12);
                const months = item.month % 12;
                period = months > 0 ? 
                    `Année ${years}, Mois ${months}` : 
                    `Année ${years}`;
            }
            
            row.innerHTML = `
                <td>${period}</td>
                <td>${formatCurrency(item.balance)}</td>
                <td>${formatCurrency(item.interest)}</td>
                <td>${formatCurrency(item.principal)}</td>
                <td>${formatCurrency(item.insurance)}</td>
                <td>${formatCurrency(item.payment)}</td>
            `;
            tableBody.appendChild(row);
        });
    }
    
    // Formatage monétaire
    function formatCurrency(value) {
        return new Intl.NumberFormat('fr-FR', { 
            style: 'currency', 
            currency: 'EUR',
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(value);
    }
    
    // Affichage des messages d'alerte
    function showAlert(message, type = 'success') {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
        alertDiv.role = 'alert';
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        
        const container = document.querySelector('.simulator-form .container');
        container.prepend(alertDiv);
        
        setTimeout(() => {
            alertDiv.classList.remove('show');
            setTimeout(() => alertDiv.remove(), 150);
        }, 5000);
    }
    
    // Bouton d'impression
    document.getElementById('printResults')?.addEventListener('click', function() {
        const printContents = resultsSection.innerHTML;
        const originalContents = document.body.innerHTML;
        
        document.body.innerHTML = `
            <div class="container mt-5">
                <h2 class="text-center mb-4">Résultats de votre simulation de prêt</h2>
                ${printContents}
                <div class="text-center mt-4 text-muted">
                    Simulation générée le ${new Date().toLocaleDateString('fr-FR')}
                </div>
            </div>
        `;
        
        window.print();
        document.body.innerHTML = originalContents;
        window.location.reload();
    });
    
    // Initialisation
    updateSliderBubbles();
    calculateRealTime();
});