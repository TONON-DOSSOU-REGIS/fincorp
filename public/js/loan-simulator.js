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
    
    // Synchronisation des sliders et inputs
    amountRange.addEventListener('input', () => {
        amountInput.value = amountRange.value;
        calculateRealTime();
    });
    
    amountInput.addEventListener('input', () => {
        amountRange.value = amountInput.value;
        calculateRealTime();
    });
    
    durationRange.addEventListener('input', () => {
        durationInput.value = durationRange.value;
        calculateRealTime();
    });
    
    durationInput.addEventListener('input', () => {
        durationRange.value = durationInput.value;
        calculateRealTime();
    });
    
    rateRange.addEventListener('input', () => {
        rateInput.value = rateRange.value;
        calculateRealTime();
    });
    
    rateInput.addEventListener('input', () => {
        rateRange.value = rateInput.value;
        calculateRealTime();
    });
    
    // Calcul en temps réel
    function calculateRealTime() {
        const amount = parseFloat(amountInput.value) || 0;
        const duration = parseInt(durationInput.value) || 1;
        const rate = parseFloat(rateInput.value) || 0.1;
        
        if (amount < 1000 || amount > 1000000 || duration < 1 || duration > 30 || rate < 0.1 || rate > 20) {
            return;
        }
        
        const monthlyRate = rate / 100 / 12;
        const term = duration * 12;
        
        let monthlyPayment;
        if (monthlyRate === 0) {
            monthlyPayment = amount / term;
        } else {
            monthlyPayment = (amount * monthlyRate) / (1 - Math.pow(1 + monthlyRate, -term));
        }
        
        const totalPayment = monthlyPayment * term;
        const totalInterest = totalPayment - amount;
        
        // Afficher les résultats en temps réel
        document.getElementById('rtMonthlyPayment').textContent = formatCurrency(monthlyPayment);
        document.getElementById('rtTotalInterest').textContent = formatCurrency(totalInterest);
        document.getElementById('rtTotalPayment').textContent = formatCurrency(totalPayment);
        
        realTimeResults.style.display = 'block';
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
                throw new Error('Calcul échoué');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Une erreur est survenue. Veuillez vérifier vos données.');
        })
        .finally(() => {
            submitText.textContent = 'Calculer mon prêt';
            submitSpinner.classList.add('d-none');
            submitBtn.disabled = false;
        });
    });
    
    // Afficher les résultats détaillés
    function displayResults(data) {
        document.getElementById('monthlyPayment').textContent = formatCurrency(data.monthly_payment);
        document.getElementById('totalInterest').textContent = formatCurrency(data.total_interest);
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
    
    // Bouton d'impression
    document.getElementById('printResults')?.addEventListener('click', function() {
        window.print();
    });
    
    // Calcul initial
    calculateRealTime();
});