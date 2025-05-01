<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\LoanRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'loan_amount' => 'required|numeric',
            'loan_duration' => 'required|numeric',
            'message' => 'required|string|max:1000',
        ]);
         // Sauvegarde dans la base de données
         $loan = LoanRequest::create($request->all());

        
        // Envoi de l'email
        Mail::send('emails.loan', ['loan' => $loan], function ($message) use ($loan) {
            $message->to('contact@fincorpfinance.fr')
                    ->subject('Nouvelle demande de prêt de ' . $loan->name);
        });

        return redirect()->route('contact')->with('success', 'Votre message a été envoyé avec succès. Nous vous contacterons bientôt.');
    }
}
