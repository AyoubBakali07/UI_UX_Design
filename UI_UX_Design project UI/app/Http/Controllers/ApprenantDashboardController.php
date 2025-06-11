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
        $apprenant = Auth::guard('apprenant')->user();
        $autoformation = null;

        // Get all tutorials for the apprenant (even if not started)
        if ($autoformationId) {
            $autoformation = Autoformation::with('tutoriels')->findOrFail($autoformationId);
            $tutoriels = $autoformation->tutoriels;
        } else {
            $tutoriels = \App\Models\Tutoriel::with('autoformation')->get();
        }

        $inProgressTutorials = $tutoriels->map(function ($tutoriel) use ($apprenant) {
            $realisation = \App\Models\RealisationTutoriel::where('apprenant_id', $apprenant->id)
                ->where('tutoriel_id', $tutoriel->id)
                ->first();
            if ($realisation) {
                return [
                    'id'       => $tutoriel->id,
                    'realisation_id' => $realisation->id,
                    'name'     => $tutoriel->title,
                    'start'    => $realisation->created_at ? $realisation->created_at->format('M d, Y') : '',
                    'status'   => $realisation->etat,
                    'autoformation_name' => $tutoriel->autoformation->title,
                    'github'   => $realisation->github_link ?? '',
                ];
            } else {
                return [
                    'id'       => $tutoriel->id,
                    'realisation_id' => null,
                    'name'     => $tutoriel->title,
                    'start'    => '',
                    'status'   => 'Non commencé',
                    'autoformation_name' => $tutoriel->autoformation->title,
                    'github'   => '',
                ];
            }
        });

        // Calculate progress metrics based on new logic
        $totalTutoriels = $tutoriels->count();
        $completedTutoriels = 0;
        foreach ($tutoriels as $tutoriel) {
            $realisation = \App\Models\RealisationTutoriel::where('apprenant_id', $apprenant->id)
                ->where('tutoriel_id', $tutoriel->id)
                ->where('etat', 'Terminé')
                ->first();
            if ($realisation) {
                $completedTutoriels++;
            }
        }

        $progress = 0;
        if ($totalTutoriels > 0) {
            $progress = round(($completedTutoriels / $totalTutoriels) * 100);
        }

        // Pass data to the view
        return view('Apprenant.dashboard', compact('inProgressTutorials', 'progress', 'completedTutoriels', 'totalTutoriels', 'autoformation', 'autoformationId'));
    }
} 