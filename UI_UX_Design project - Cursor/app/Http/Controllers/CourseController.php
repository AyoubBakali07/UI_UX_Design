<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Autoformation;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Formation::with(['autoformations', 'tutos'])
            ->latest()
            ->paginate(12);
            
        return view('courses.index', compact('courses'));
    }
    
    public function show(Formation $course)
    {
        $course->load(['autoformations', 'tutos']);
        return view('courses.show', compact('course'));
    }
    
    public function manage()
    {
        $instructor = auth()->user();
        $courses = Formation::where('instructor_id', $instructor->id)
            ->with(['autoformations', 'tutos'])
            ->latest()
            ->paginate(10);
            
        return view('instructor.courses.manage', compact('courses'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'niveau' => 'required|in:debutant,intermediaire,avance',
            'duree' => 'required|integer|min:1'
        ]);
        
        $course = Formation::create([
            'instructor_id' => auth()->id(),
            ...$validated
        ]);
        
        return redirect()->route('courses.manage')
            ->with('success', 'Course created successfully.');
    }
    
    public function update(Request $request, Formation $course)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'niveau' => 'required|in:debutant,intermediaire,avance',
            'duree' => 'required|integer|min:1'
        ]);
        
        $course->update($validated);
        
        return redirect()->route('courses.manage')
            ->with('success', 'Course updated successfully.');
    }
    
    public function destroy(Formation $course)
    {
        $course->delete();
        
        return redirect()->route('courses.manage')
            ->with('success', 'Course deleted successfully.');
    }
} 