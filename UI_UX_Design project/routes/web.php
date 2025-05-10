<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/formateur/dashboard', [App\Http\Controllers\FormateurDashboardController::class, 'index'])->name('formateur.dashboard');