<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

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

        $data = $request->all();

        Mail::to('tononregis67@gmail.com')->send(new ContactFormMail($data));

        return redirect()->route('contact')->with('success', 'Votre message a été envoyé avec succès. Nous vous contacterons bientôt.');
    }
}
