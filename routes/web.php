<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoanController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/loan-simulator', [LoanController::class, 'simulator'])->name('loan.simulator');
Route::post('/calculate-loan', [LoanController::class, 'calculate'])->name('loan.calculate');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/simulateur-de-pret', [LoanController::class, 'simulator'])->name('loan.simulator');
Route::post('/calculer-pret', [LoanController::class, 'calculate'])->name('loan.calculate');

