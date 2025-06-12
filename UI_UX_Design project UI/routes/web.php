<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ApprenantCourseController;
use App\Http\Controllers\FormateurDashboardController;
use App\Http\Controllers\ApprenantDashboardController;

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Formateur Routes
Route::middleware(['auth:formateur'])->group(function () {
    Route::get('/formateur/dashboard', [FormateurDashboardController::class, 'index'])->name('formateur.dashboard');
});

// Apprenant Routes
Route::middleware(['auth:apprenant'])->group(function () {
    Route::get('/Apprenant/dashboard/{autoformationId?}', [ApprenantDashboardController::class, 'index'])->name('Apprenant.dashboard');
    Route::get('/Apprenant/courses', [ApprenantCourseController::class, 'index'])->name('Apprenant.courses.index');
    // Route::get('/Apprenant/course/{autoformationId}/sections', [ApprenantCourseController::class, 'sections'])->name('Apprenant.course.sections');
    Route::get('/Apprenant/course/{autoformationId}/tutorial/{tutorialId}/edit', [ApprenantCourseController::class, 'editRealisation'])->name('apprenant.course.section.edit');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
