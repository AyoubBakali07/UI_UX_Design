<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprenant;
use App\Models\RealisationTutoriel;
use App\Models\Autoformation;
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

        // Fetch all Autoformations to display as "Mes Cours" (using the correct relationship name)
        $autoformations = Autoformation::with('tutoriels')->get();

        // Fetch the student's in-progress tutorial realisations for "Mes Informations"
        $realisationTutorielsInProgress = RealisationTutoriel::where('apprenant_id', $apprenant->id)
            ->where('etat', 'encours')
            ->with('tutoriel.autoformation') // Eager load tutorial and its autoformation
            ->get();

        // Prepare data for the "Mes Informations" table
        $inProgressTutorials = $realisationTutorielsInProgress->map(function ($realisation) {
            return [
                'id'       => $realisation->tutoriel->id, // Tutorial ID
                'name'     => $realisation->tutoriel->title, // Tutorial Title
                'start'    => $realisation->created_at->format('M d, Y'), // Realisation start date
                'status'   => $realisation->etat, // Realisation status
                'autoformation_name' => $realisation->tutoriel->autoformation->title, // Autoformation Title
            ];
        });

        // Prepare data for the "Mes Cours" section (still all autoformations)
        $allCourses = $autoformations->map(function ($autoformation) use ($apprenant) {
            // Fetch the student's realisations for tutorials within this autoformation
            $realisationTutorielsForAutoformation = $apprenant->realisationTutoriels()
                ->whereIn('tutoriel_id', $autoformation->tutoriels->pluck('id'))
                ->get();

            // Calculate progress
            $totalTutorielsInAutoformation = $autoformation->tutoriels->count();
            $completedTutoriels = $realisationTutorielsForAutoformation->where('etat', 'termine')->count();

            $progress = 0;
            if ($totalTutorielsInAutoformation > 0) {
                $progress = round(($completedTutoriels / $totalTutorielsInAutoformation) * 100);
            }

            // Get the start date from RealisationAutoformation if it exists
            $startDate = 'N/A';
            $realisationAutoformation = $apprenant->realisationAutoformations->where('autoformation_id', $autoformation->id)->first();
            if ($realisationAutoformation) {
                $startDate = $realisationAutoformation->created_at->format('M d, Y');
            }

            return [
                'id'       => $autoformation->id,
                'name'     => $autoformation->title,
                'start'    => $startDate,
                'progress' => $progress,
                // You might still want the overall status of the autoformation here if needed
                'status'   => $realisationAutoformation->status ?? 'not_started', // Assuming RealisationAutoformation has a status field
            ];
        });

        // Pass both datasets to the view
        return view('Apprenant.dashboard', compact('allCourses', 'inProgressTutorials'));
    }
} 