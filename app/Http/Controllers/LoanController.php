<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function simulator()
    {
        $defaultValues = [
            'loanTypes' => [
                'personal' => 'Prêt personnel',
                'mortgage' => 'Prêt immobilier',
                'auto' => 'Crédit auto/moto',
                'professional' => 'Prêt professionnel',
                'student' => 'Prêt étudiant'
            ],
            'defaultAmount' => 20000,
            'defaultDuration' => 7,
            'defaultRate' => 4.5,
            'minAmount' => 1000,
            'maxAmount' => 1000000,
            'minDuration' => 1,
            'maxDuration' => 30,
            'minRate' => 0.1,
            'maxRate' => 20
        ];

        return view('loan-simulator', $defaultValues);
    }

    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1000|max:1000000',
            'duration' => 'required|numeric|min:1|max:30',
            'interest_rate' => 'required|numeric|min:0.1|max:20',
            'loan_type' => 'sometimes|string'
        ]);

        $amount = (float)$validated['amount'];
        $duration = (int)$validated['duration'];
        $annualRate = (float)$validated['interest_rate'];
        $loanType = $validated['loan_type'] ?? 'personal';

        // Ajustement des taux selon le type de prêt
        $rateInfo = $this->getRateInfo($loanType, $annualRate);
        $annualRate = $rateInfo['rate'];
        $insuranceRate = $rateInfo['insurance'];

        $monthlyRate = $annualRate / 100 / 12;
        $monthlyInsurance = ($amount * $insuranceRate) / 12 / 100;
        $term = $duration * 12;

        // Calcul de la mensualité hors assurance
        if ($monthlyRate == 0) {
            $monthlyPayment = $amount / $term;
        } else {
            $monthlyPayment = ($amount * $monthlyRate) / (1 - pow(1 + $monthlyRate, -$term));
        }

        // Ajout de l'assurance
        $totalMonthlyPayment = $monthlyPayment + $monthlyInsurance;
        $totalPayment = $totalMonthlyPayment * $term;
        $totalInterest = ($monthlyPayment * $term) - $amount;
        $totalInsurance = $monthlyInsurance * $term;

        // Génération du tableau d'amortissement complet
        $amortization = $this->generateAmortizationTable($amount, $term, $monthlyRate, $monthlyPayment, $monthlyInsurance);

        return response()->json([
            'success' => true,
            'loan_type' => $loanType,
            'amount' => $amount,
            'duration' => $duration,
            'annual_rate' => $annualRate,
            'insurance_rate' => $insuranceRate,
            'monthly_payment' => round($totalMonthlyPayment, 2),
            'monthly_payment_without_insurance' => round($monthlyPayment, 2),
            'monthly_insurance' => round($monthlyInsurance, 2),
            'total_interest' => round($totalInterest, 2),
            'total_insurance' => round($totalInsurance, 2),
            'total_payment' => round($totalPayment, 2),
            'amortization' => $amortization,
            'term' => $term
        ]);
    }

    private function getRateInfo($loanType, $requestedRate)
    {
        $defaultRates = [
            'personal' => ['min' => 2, 'max' => 10, 'insurance' => 0.3],
            'mortgage' => ['min' => 1.5, 'max' => 6, 'insurance' => 0.2],
            'auto' => ['min' => 1, 'max' => 8, 'insurance' => 0.5],
            'professional' => ['min' => 2.5, 'max' => 12, 'insurance' => 0.4],
            'student' => ['min' => 1, 'max' => 5, 'insurance' => 0.1]
        ];

        $config = $defaultRates[$loanType] ?? $defaultRates['personal'];
        
        return [
            'rate' => min(max($requestedRate, $config['min']), $config['max']),
            'insurance' => $config['insurance']
        ];
    }

    private function generateAmortizationTable($amount, $term, $monthlyRate, $monthlyPayment, $monthlyInsurance)
    {
        $amortization = [];
        $balance = $amount;

        for ($month = 1; $month <= $term; $month++) {
            $interest = $balance * $monthlyRate;
            $principal = $monthlyPayment - $interest;
            $balance -= $principal;

            if ($balance < 0) {
                $balance = 0;
                $principal += $balance; // Ajustement du principal pour le dernier paiement
            }

            // On garde les 12 premiers mois, puis un échantillonnage
            if ($month <= 12 || 
                $month % 12 == 0 || 
                $month >= $term - 12 || 
                ($term > 60 && $month % 6 == 0)) {
                $amortization[] = [
                    'month' => $month,
                    'balance' => max(0, $balance),
                    'interest' => $interest,
                    'principal' => $principal,
                    'insurance' => $monthlyInsurance,
                    'payment' => $monthlyPayment + $monthlyInsurance
                ];
            }
        }

        return $amortization;
    }
}