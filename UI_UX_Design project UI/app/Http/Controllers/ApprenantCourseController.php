<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprenantCourseController extends Controller
{
    public function sections($name)
    {
        // For now, just return a placeholder view with the course name
        return view('Apprenant.course_sections', compact('name'));
    }
} 