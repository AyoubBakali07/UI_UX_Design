<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprenant;
use App\Models\RealisationTutoriel;
use Illuminate\Support\Facades\Auth;

class ApprenantDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:apprenant');
    }

    public function index()
    {
        // Get the authenticated apprenant
        $apprenant = Auth::user();

        // Fetch the apprenant's tutorials and their completion status
        $courses = $apprenant->realisationTutoriels()->with('tutoriel')->get()->map(function ($realisation) {
            return [
                'name' => $realisation->tutoriel->title,
                // Use the created_at timestamp from RealisationTutoriel as the start date
                'start' => $realisation->created_at->format('M d, Y'), // Format the date as needed
                'progress' => $realisation->etat === 'termine' ? 100 : 0, // Map status to percentage
                'status' => $realisation->etat // Keep the status as well
            ];
        });

        // You can fetch real apprenant data here if needed
        // $apprenant = Apprenant::find(auth()->id());
        // $courses = ...

        return view('Apprenant.dashboard', compact('courses'));
    }
} 