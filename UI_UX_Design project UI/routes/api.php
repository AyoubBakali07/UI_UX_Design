<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApprenantCourseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API routes for tutorial realisations - protected by apprenant auth (with web middleware for session)
Route::middleware(['web', 'auth:apprenant', 'api'])->group(function () {
    Route::get('/realisations/{realisationId}', [ApprenantCourseController::class, 'getRealisation']);
    Route::post('/realisations', [ApprenantCourseController::class, 'storeRealisation']);
    Route::put('/realisations/{realisationId}', [ApprenantCourseController::class, 'updateRealisation']);
    Route::patch('/realisations/{realisationId}', [ApprenantCourseController::class, 'updateRealisation']);
}); 