<?php
// database/seeders/AutoformationSeeder.php

namespace Database\Seeders;

use App\Models\Autoformation;
use App\Models\Formateur;
use Illuminate\Database\Seeder;

class AutoformationSeeder extends Seeder
{
    public function run(): void
    {
        // Récupération des formateurs
        $formateur1 = Formateur::where('email', 'formateur@mail.com')->first(); // John Doe
        $formateur2 = Formateur::where('email', 'jane@mail.com')->first();      // Jane Smith

        // 6 autoformations pour John Doe
        Autoformation::create([
            'title'        => 'JavaScript Fondamentaux',
            'description'  => 'Bases de JS : variables, fonctions, objets.',
            'formateur_id' => $formateur1->id,
        ]);
        Autoformation::create([
            'title'        => 'Techniques avancées de CSS',
            'description'  => 'Flexbox, Grid, animations et responsive.',
            'formateur_id' => $formateur1->id,
        ]);
        Autoformation::create([
            'title'        => 'HTML & CSS pour Débutants',
            'description'  => 'Structure d’une page, classes, sélecteurs.',
            'formateur_id' => $formateur1->id,
        ]);
        Autoformation::create([
            'title'        => 'POO en PHP',
            'description'  => 'Classes, objets, méthodes et héritage.',
            'formateur_id' => $formateur1->id,
        ]);
        Autoformation::create([
            'title'        => 'Android & Kotlin',
            'description'  => 'Créer votre première app Android avec Kotlin.',
            'formateur_id' => $formateur1->id,
        ]);
        Autoformation::create([
            'title'        => 'Laravel : Framework PHP',
            'description'  => 'Routes, contrôleurs, migrations et Eloquent.',
            'formateur_id' => $formateur1->id,
        ]);

        // 6 autoformations pour Jane Smith
        Autoformation::create([
            'title'        => 'Docker & Orchestration',
            'description'  => 'Conteneurisation, Docker Compose, déploiement.',
            'formateur_id' => $formateur2->id,
        ]);
        Autoformation::create([
            'title'        => 'Vue.js : Frontend Moderne',
            'description'  => 'Composants réactifs et état global.',
            'formateur_id' => $formateur2->id,
        ]);
        Autoformation::create([
            'title'        => 'Python : Bases & Avancées',
            'description'  => 'Syntaxe, POO, bibliothèques courantes.',
            'formateur_id' => $formateur2->id,
        ]);
        Autoformation::create([
            'title'        => 'Symfony : Framework PHP',
            'description'  => 'Bundles, routing, services et Twig.',
            'formateur_id' => $formateur2->id,
        ]);
        Autoformation::create([
            'title'        => 'React : Interfaces Dynamiques',
            'description'  => 'JSX, hooks et gestion d’état.',
            'formateur_id' => $formateur2->id,
        ]);
        Autoformation::create([
            'title'        => 'Node.js & Express',
            'description'  => 'Créer des API REST performantes.',
            'formateur_id' => $formateur2->id,
        ]);
    }
}
