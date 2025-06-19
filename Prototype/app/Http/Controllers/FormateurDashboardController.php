<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprenant;
use App\Models\Tutoriel;
use App\Models\Autoformation;
use Illuminate\Support\Facades\Auth;
use App\Models\RealisationTutoriel;
use App\Models\RealisationAutoformation;

class FormateurDashboardController extends Controller
{
    public function index()
    {
        $formateur = Auth::guard('formateur')->user();
        $formateurGroupId = $formateur->groupe_id;

        // Get autoformations created by this formateur
        $formateurAutoformations = Autoformation::where('formateur_id', $formateur->id)->get();
        $formateurAutoformationIds = $formateurAutoformations->pluck('id');

        // Get tutorial IDs within those autoformations
        $formateurTutorialIds = Tutoriel::whereIn('autoformation_id', $formateurAutoformationIds)->pluck('id');

        // Calculate total relevant tutorials for progress calculation
        $totalRelevantTutoriels = $formateurTutorialIds->count();

        // Get apprenants in the formateur's group
        $apprenants = Apprenant::where('groupe_id', $formateurGroupId)
            ->with(['realisationTutoriels', 'realisationAutoformations'])
            ->get()
            ->map(function ($apprenant) use ($formateurAutoformations, $formateurTutorialIds, $totalRelevantTutoriels) {
                // Tutoriels terminés
                $completedRelevantTutorials = $apprenant->realisationTutoriels
                    ->whereIn('tutoriel_id', $formateurTutorialIds)
                    ->where('etat', 'Terminé')
                    ->count();

                // Autoformations terminées: Only if all tutoriels in the autoformation are done
                $completedRelevantAutoformations = 0;
                foreach ($formateurAutoformations as $autoformation) {
                    $tutoriels = $autoformation->tutoriels;
                    if ($tutoriels->count() === 0) continue;
                    $allTutorielsDone = $tutoriels->every(function ($tutoriel) use ($apprenant) {
                        return \App\Models\RealisationTutoriel::where('apprenant_id', $apprenant->id)
                            ->where('tutoriel_id', $tutoriel->id)
                            ->where('etat', 'Terminé')
                            ->exists();
                    });
                    if ($allTutorielsDone) {
                        $completedRelevantAutoformations++;
                    }
                }

                // Calculate progression
                $progress = $totalRelevantTutoriels > 0
                    ? round(($completedRelevantTutorials / $totalRelevantTutoriels) * 100)
                    : 0;

                return [
                    'name'      => $apprenant->name,
                    'progress'  => $progress,
                    'tutorials' => $completedRelevantTutorials,
                    'autoformations' => $completedRelevantAutoformations,
                ];
            });

        // Filter apprenants in difficulty (progress < 50%) within this group
        $difficultes = $apprenants
            ->where('progress', '<', 50)
            ->pluck('name')
            ->all();

        // Build progress distribution for this group
        $distribution = [
            'over_75'      => $apprenants->where('progress', '>', 75)->count(),
            'between_50_75'=> $apprenants->whereBetween('progress', [50, 75])->count(),
            'under_50'     => $apprenants->where('progress', '<', 50)->count(),
        ];

        // Constants for the "Retards" section (these might still be general, or you could filter based on relevant realisations)
        $retards = [
            'Incompréhension contenu',
            'Problèmes techniques',
            'Gestion du temps'
        ];

        return view(
            'Formateur.dashoboard', // Ensure this matches your view file name
            compact('apprenants', 'difficultes', 'retards', 'distribution')
        );
    }
}
