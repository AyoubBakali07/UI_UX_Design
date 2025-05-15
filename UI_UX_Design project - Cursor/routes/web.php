<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\FeedbackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Common routes
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    
    // Student routes
    Route::middleware(['role:student'])->group(function () {
        Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
        Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
        Route::get('/courses/{course}/learn', [CourseController::class, 'learn'])->name('courses.learn');
        Route::post('/tutorials/update-status', [TutorialController::class, 'updateStatus'])->name('tutorial.update-status');
        Route::get('/profile/courses', [StudentController::class, 'myCourses'])->name('student.courses');
        Route::get('/profile/achievements', [StudentController::class, 'achievements'])->name('student.achievements');
    });

    // Instructor routes
    Route::middleware(['role:instructor'])->group(function () {
        Route::get('/instructor/dashboard', [InstructorController::class, 'dashboard'])->name('instructor.dashboard');
        
        // Course management
        Route::get('/instructor/courses', [CourseController::class, 'manage'])->name('courses.manage');
        Route::post('/instructor/courses', [CourseController::class, 'store'])->name('courses.store');
        Route::put('/instructor/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
        Route::delete('/instructor/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
        
        // Tutorial management
        Route::resource('tutorials', TutorialController::class)->except(['index', 'show']);
        
        // Student progress
        Route::get('/instructor/students', [InstructorController::class, 'students'])->name('instructor.students');
        Route::get('/instructor/students/{student}', [InstructorController::class, 'showStudent'])->name('instructor.student.show');
        
        // Analytics
        Route::get('/instructor/analytics', [InstructorController::class, 'analytics'])->name('instructor.analytics');
        
        // Feedback
        Route::post('/feedback', [FeedbackController::class, 'send'])->name('feedback.send');
        Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    });
});

require __DIR__.'/auth.php';