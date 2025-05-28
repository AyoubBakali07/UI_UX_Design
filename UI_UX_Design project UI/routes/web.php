<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ApprenantCourseController;

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});
Route::get('/formateur/dashboard', [App\Http\Controllers\FormateurDashboardController::class, 'index'])->name('formateur.dashboard');
Route::get('/Apprenant/dashboard', [App\Http\Controllers\ApprenantDashboardController::class, 'index'])->name('Apprenant.dashboard');
Route::get('/Apprenant/course/{autoformationId}/sections', [App\Http\Controllers\ApprenantCourseController::class, 'sections'])->name('Apprenant.course.sections');

// Define the route for editing a course section realisation, using tutorialId
Route::get('/Apprenant/course/{autoformationId}/tutorial/{tutorialId}/edit', [ApprenantCourseController::class, 'editRealisation'])->name('apprenant.course.section.edit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
