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
            'defaultAmount' => 10000,
            'defaultDuration' => 5, // Réduit à 5 ans par défaut (plus réaliste)
            'defaultRate' => 3.5
        ];

        return view('loan-simulator', $defaultValues);
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000|max:1000000',
            'duration' => 'required|numeric|min:1|max:30',
            'interest_rate' => 'required|numeric|min:0.1|max:20',
            'loan_type' => 'sometimes|string'
        ]);

        $amount = (float)$request->amount;
        $duration = (int)$request->duration;
        $interestRate = (float)$request->interest_rate;
        $loanType = $request->loan_type ?? 'personal';

        // Ajustement du taux selon le type de prêt (optionnel)
        switch ($loanType) {
            case 'mortgage':
                $interestRate = min($interestRate, 6); // Taux max pour immo
                break;
            case 'auto':
                $interestRate = min($interestRate, 8); // Taux max pour auto
                break;
        }

        $monthlyRate = $interestRate / 100 / 12;
        $term = $duration * 12;

        // Calcul de la mensualité
        if ($monthlyRate == 0) {
            $monthlyPayment = $amount / $term;
        } else {
            $monthlyPayment = ($amount * $monthlyRate) / (1 - pow(1 + $monthlyRate, -$term));
        }

        $totalPayment = $monthlyPayment * $term;
        $totalInterest = $totalPayment - $amount;

        // Génération du tableau d'amortissement simplifié
        $amortization = [];
        $balance = $amount;

        for ($month = 1; $month <= $term; $month++) {
            $interest = $balance * $monthlyRate;
            $principal = $monthlyPayment - $interest;
            $balance -= $principal;

            if ($balance < 0) $balance = 0;

            // On garde les 6 premiers mois, le milieu et les 6 derniers
            if ($month <= 6 || 
                $month >= $term - 6 || 
                ($term > 12 && $month == floor($term / 2))) {
                $amortization[] = [
                    'month' => $month,
                    'balance' => $balance,
                    'interest' => $interest,
                    'principal' => $principal,
                    'payment' => $monthlyPayment
                ];
            }
        }

        return response()->json([
            'success' => true,
            'monthly_payment' => round($monthlyPayment, 2),
            'total_interest' => round($totalInterest, 2),
            'total_payment' => round($totalPayment, 2),
            'amortization' => $amortization,
            'term' => $term
        ]);
    }
}