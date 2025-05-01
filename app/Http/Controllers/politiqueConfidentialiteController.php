<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class politiqueConfidentialiteController extends Controller
{
    public function politiqueConfidentialite(){
        return view("politique-confidentialite");
    }
}
