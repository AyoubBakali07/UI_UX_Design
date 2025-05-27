<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprenant;

class ApprenantDashboardController extends Controller
{
    public function index()
    {
        // Example: Fetch apprenant's courses and progress (static for now, adapt as needed)
        $courses = [
            [
                'name' => 'HTML/CSS',
                'start' => 'May 12',
                'progress' => 100,
            ],
            [
                'name' => 'PHP Eloquent',
                'start' => 'June 03',
                'progress' => 25,
            ],
        ];

        // You can fetch real apprenant data here if needed
        // $apprenant = Apprenant::find(auth()->id());
        // $courses = ...

        return view('Apprenant.dashboard', compact('courses'));
    }
} 