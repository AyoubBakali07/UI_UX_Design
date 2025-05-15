<?php

namespace App\Http\Controllers;

use App\Models\Apprenant;
use App\Models\Autoformation;
use App\Models\Formation;
use App\Models\Tuto;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function dashboard()
    {
        $instructor = auth()->user();
        
        // Get statistics
        $totalStudents = Apprenant::count();
        $activeCourses = Formation::where('instructor_id', $instructor->id)->count();
        $totalTutorials = Tuto::whereHas('formation', function($query) use ($instructor) {
            $query->where('instructor_id', $instructor->id);
        })->count();
        
        // Calculate completion rate
        $completedEnrollments = Autoformation::whereHas('formation', function($query) use ($instructor) {
            $query->where('instructor_id', $instructor->id);
        })->whereHas('apprenants', function($query) {
            $query->wherePivot('status', 'completed');
        })->count();
        
        $totalEnrollments = Autoformation::whereHas('formation', function($query) use ($instructor) {
            $query->where('instructor_id', $instructor->id);
        })->whereHas('apprenants')->count();
        
        $completionRate = $totalEnrollments > 0 
            ? round(($completedEnrollments / $totalEnrollments) * 100) 
            : 0;
        
        // Get student progress data
        $studentProgress = Apprenant::whereHas('autoformations', function($query) use ($instructor) {
            $query->whereHas('formation', function($q) use ($instructor) {
                $q->where('instructor_id', $instructor->id);
            });
        })->with(['autoformations' => function($query) use ($instructor) {
            $query->whereHas('formation', function($q) use ($instructor) {
                $q->where('instructor_id', $instructor->id);
            });
        }])->paginate(10);
        
        return view('instructor.dashboard', compact(
            'totalStudents',
            'activeCourses',
            'totalTutorials',
            'completionRate',
            'studentProgress'
        ));
    }
} 