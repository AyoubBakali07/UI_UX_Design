<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});
Route::get('/formateur/dashboard', [App\Http\Controllers\FormateurDashboardController::class, 'index'])->name('formateur.dashboard');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
