<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Apprenant;
use App\Models\Formation;
use App\Models\Autoformation;
use App\Models\Realisation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        switch ($user->role) {
            case 'admin':
                return $this->adminDashboard();
            case 'instructor':
                return $this->instructorDashboard();
            case 'student':
                return $this->studentDashboard();
            default:
                return view('dashboard');
        }
    }

    private function adminDashboard()
    {
        $stats = [
            'total_students' => Apprenant::count(),
            'total_courses' => Formation::count(),
            'total_modules' => Autoformation::count(),
            'recent_registrations' => Apprenant::latest()->take(5)->get()
        ];

        return view('dashboard.admin', compact('stats'));
    }

    private function instructorDashboard()
    {
        // Get all students with their progress
        $studentProgress = Apprenant::with(['autoformations', 'realisations'])
            ->get()
            ->map(function ($student) {
                $totalCourses = $student->autoformations->count();
                $completedCourses = $student->autoformations()
                    ->wherePivot('status', 'completed')
                    ->count();
                
                $progress = $totalCourses > 0 
                    ? round(($completedCourses / $totalCourses) * 100) 
                    : 0;

                return [
                    'nom' => $student->nom,
                    'prenom' => $student->prenom,
                    'progress' => $progress,
                    'completed_tutorials_count' => $student->autoformations()
                        ->wherePivot('status', 'completed')
                        ->count(),
                    'completed_projects_count' => $student->realisations()
                        ->where('status', 'completed')
                        ->count()
                ];
            });

        // Get struggling students (less than 50% progress)
        $strugglingStudents = $studentProgress
            ->where('progress', '<', 50)
            ->sortBy('progress')
            ->take(5);

        // Analyze delay reasons
        $delayReasons = [
            'Difficulté technique' => 4,
            'Manque de temps' => 3,
            'Compréhension des concepts' => 2,
            'Problèmes d\'environnement' => 2
        ];

        return view('dashboard.instructor', compact('studentProgress', 'strugglingStudents', 'delayReasons'));
    }

    private function studentDashboard()
    {
        $user = auth()->user();
        $student = $user->apprenant;

        if (!$student) {
            // If the user doesn't have an apprenant record, create one
            $student = Apprenant::create([
                'user_id' => $user->id,
                'nom' => explode(' ', $user->name)[1] ?? '',  // Last name
                'prenom' => explode(' ', $user->name)[0] ?? '', // First name
                'email' => $user->email,
                'telephone' => ''  // This can be updated by the user later
            ]);
        }

        $stats = [
            'in_progress_courses' => $student->autoformations()
                ->wherePivot('status', 'in_progress')
                ->with('formation')
                ->get(),
            'completed_courses' => $student->autoformations()
                ->wherePivot('status', 'completed')
                ->count(),
            'recent_activities' => $student->autoformations()
                ->latest()
                ->take(5)
                ->get()
        ];

        return view('dashboard.student', compact('stats'));
    }
} 