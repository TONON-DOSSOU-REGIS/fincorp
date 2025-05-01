<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function mentionsLegales(){
        return view("mentions-legales");
    }
}
