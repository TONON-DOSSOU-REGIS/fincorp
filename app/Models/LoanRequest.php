<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'loan_amount',
        'loan_duration',
        'message',
    ];
}
