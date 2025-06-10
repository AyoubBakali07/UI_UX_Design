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

    public function index($autoformationId = null)
    {
        // Get the authenticated apprenant
        $apprenant = Auth::user();

        $query = RealisationTutoriel::where('apprenant_id', $apprenant->id);
        $autoformation = null;

        if ($autoformationId) {
            $autoformation = Autoformation::findOrFail($autoformationId);
            $query->whereHas('tutoriel', function ($q) use ($autoformationId) {
                $q->where('autoformation_id', $autoformationId);
            });
        }

        $realisationTutorielsInProgress = (clone $query)
            ->with('tutoriel.autoformation')
            ->get();

        // $realisationTutorielsInProgress = (clone $query)->where('etat', 'termine')
        //     ->with('tutoriel.autoformation')
        //     ->get();

        // Prepare data for the "Mes Informations" table
        $inProgressTutorials = $realisationTutorielsInProgress->map(function ($realisation) {
            return [
                'id'       => $realisation->tutoriel->id,
                'name'     => $realisation->tutoriel->title,
                'start'    => $realisation->created_at->format('M d, Y'),
                'status'   => $realisation->etat,
                'autoformation_name' => $realisation->tutoriel->autoformation->title,
            ];
        });

        // Calculate progress metrics based on the query
        $totalTutoriels = $query->count();
        $completedTutoriels = (clone $query)->where('etat', 'termine')->count();

        $progress = 0;
        if ($totalTutoriels > 0) {
            $progress = round(($completedTutoriels / $totalTutoriels) * 100);
        }

        // Pass data to the view
        return view('Apprenant.dashboard', compact('inProgressTutorials', 'progress', 'completedTutoriels', 'totalTutoriels', 'autoformation', 'autoformationId'));
    }
} 