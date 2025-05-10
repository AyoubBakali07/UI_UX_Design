<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormateurDashboardController extends Controller
{
    public function index()
    {
        // Example data (replace with your own logic or database queries)
        $apprenants = [
            ['name' => 'Alice Dupont', 'progress' => 80, 'tutorials' => 8, 'projects' => 2],
            ['name' => 'Benjamin Lefevre', 'progress' => 60, 'tutorials' => 6, 'projects' => 1],
            ['name' => 'Chioé Martin', 'progress' => 40, 'tutorials' => 4, 'projects' => 1],
            ['name' => 'David Bernard', 'progress' => 30, 'tutorials' => 3, 'projects' => 0],
            ['name' => 'Emma Robert', 'progress' => 90, 'tutorials' => 9, 'projects' => 3],
        ];

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
