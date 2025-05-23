<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprenant;

class FormateurDashboardController extends Controller
{
    public function index()
    {
        $apprenants = Apprenant::all()->map(function($apprenant){
            return [
                'name' => $apprenant->name,
                 'progress' => rand (30, 80),
                'tutorials' => rand(4,8),
                'projects' => rand(0,4),
    
            ];
        });
     
        // Example data (replace with your own logic or database queries)
       
       

        $difficultes = ['David Bernard', 'Chioé Martin'];

        $retards = [
            'Incompréhension contenu',
            'Problèmes techniques',
            'Gestion du temps'
        ];

        $distribution = [
            'over_75' => 2,
            'between_50_75' => 2,
            'under_50' => 1
        ];

        return view('Formateur.dashoboard', compact('apprenants', 'difficultes', 'retards', 'distribution'));
    }
}
