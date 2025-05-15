<?php

namespace App\Http\Controllers;

use App\Models\Apprenant;
use App\Models\Autoformation;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        $student = auth()->user()->apprenant;
        
        $inProgressCount = $student->autoformations()
            ->wherePivot('status', 'in_progress')
            ->count();
            
        $completedCount = $student->autoformations()
            ->wherePivot('status', 'completed')
            ->count();
            
        $achievementsCount = $student->realisations()->count();
        
        $currentCourses = $student->autoformations()
            ->with(['formation', 'tutos'])
            ->wherePivot('status', 'in_progress')
            ->get();
            
        $recentAchievements = $student->realisations()
            ->latest()
            ->take(5)
            ->get();
            
        return view('student.dashboard', compact(
            'inProgressCount',
            'completedCount',
            'achievementsCount',
            'currentCourses',
            'recentAchievements'
        ));
    }
} 