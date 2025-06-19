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

        // Find the apprenant's formateur (teacher) by groupe_id
        $formateur = \App\Models\Formateur::where('groupe_id', $apprenant->groupe_id)->first();
        // Get only autoformations of this formateur
        $autoformations = \App\Models\Autoformation::where('formateur_id', $formateur->id)->get();
        $formateurAutoformationIds = $autoformations->pluck('id');

        // Get all tutorials for the apprenant (even if not started), but only those for their teacher
        if ($autoformationId) {
            $autoformation = Autoformation::with('tutoriels')->where('id', $autoformationId)->whereIn('id', $formateurAutoformationIds)->firstOrFail();
            $tutoriels = $autoformation->tutoriels;
        } else {
            $tutoriels = \App\Models\Tutoriel::with('autoformation')
                ->whereIn('autoformation_id', $formateurAutoformationIds)
                ->paginate(10);
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
                    'course_link' => $tutoriel->course_link,
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
                    'course_link' => $tutoriel->course_link,
                ];
            }
        });

        // Calculate progress metrics accurately
        if ($autoformationId) {
            // Progress within the selected autoformation
            $totalTutoriels = $tutoriels->count();
            $completedTutoriels = \App\Models\RealisationTutoriel::where('apprenant_id', $apprenant->id)
                ->whereIn('tutoriel_id', $tutoriels->pluck('id'))
                ->where('etat', 'Terminé')
                ->count();
        } else {
            // Global progress across all tutoriels belonging to this apprenant's teacher
            $tutorielIds = \App\Models\Tutoriel::whereIn('autoformation_id', $formateurAutoformationIds)->pluck('id');
            $totalTutoriels = $tutorielIds->count();
            $completedTutoriels = \App\Models\RealisationTutoriel::where('apprenant_id', $apprenant->id)
                ->whereIn('tutoriel_id', $tutorielIds)
                ->where('etat', 'Terminé')
                ->count();
        }

        // Avoid division by zero

        // Calculate percentage
        $progress = $totalTutoriels > 0 ? round(($completedTutoriels / $totalTutoriels) * 100) : 0;

        // Pass data to the view
        return view('Apprenant.dashboard', compact('inProgressTutorials', 'progress', 'completedTutoriels', 'totalTutoriels', 'autoformation', 'autoformationId', 'tutoriels'));
    }
} 