<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprenant;
use App\Models\Tutoriel;

class FormateurDashboardController extends Controller
{
    public function index()
    {
        // 1) Récupérer le nombre total de tutoriels dans la plate-forme
        $totalTutoriels = Tutoriel::count();

        // 2) Construire la liste des apprenants avec progression, tutoriels et projets terminés
        $apprenants = Apprenant::withCount([
            // count des tutoriels terminés
            'realisationTutoriels as tutorials' => function ($q) {
                $q->where('etat', 'termine');
            },
            // count des projets (autoformations) terminés
            'realisationAutoformations as projects' => function ($q) {
                $q->where('status', 'termine');
            },
        ])->get()->map(function ($apprenant) use ($totalTutoriels) {
            // 3) Calcul de la progression en pourcentage
            $completed = $apprenant->tutorials;  // alias défini dans withCount
            $progress = $totalTutoriels > 0
                ? round(($completed / $totalTutoriels) * 100)
                : 0;

            return [
                'name'      => $apprenant->name,      // ou ->name si tu utilises 'name' en base
                'progress'  => $progress,
                'tutorials' => $completed,
                'projects'  => $apprenant->projects,
            ];
        });
        

        // 4) Détecter les apprenants en difficulté (< 50%)
        $difficultes = $apprenants
            ->where('progress', '<', 50)
            ->pluck('name')
            ->all();

        // 5) Construire la distribution selon les paliers
        $distribution = [
            'over_75'      => $apprenants->where('progress', '>', 75)->count(),
            'between_50_75'=> $apprenants->whereBetween('progress', [50, 75])->count(),
            'under_50'     => $apprenants->where('progress', '<', 50)->count(),
        ];

        // 6) Constantes pour la partie "Retards"
        $retards = [
            'Incompréhension contenu',
            'Problèmes techniques',
            'Gestion du temps'
        ];

        return view(
            // formateur/dashboard
            'Formateur.dashoboard',
            compact('apprenants', 'difficultes', 'retards', 'distribution')
        );
    }
}
