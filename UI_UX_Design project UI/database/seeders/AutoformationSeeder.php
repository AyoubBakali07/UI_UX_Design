<?php

namespace Database\Seeders;

use App\Models\Autoformation;
use App\Models\Formateur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AutoformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the formateurs
        $formateur1 = Formateur::where('email', 'formateur@mail.com')->first(); // John Doe
        $formateur2 = Formateur::where('email', 'jane@mail.com')->first(); // Jane Smith

        // Create autoformations and assign formateur_id
        Autoformation::create([
            'title' => 'JavaScript Fondamentaux',
            'description' => 'Découvrez les bases de JavaScript : variables, opérateurs, structures de contrôle, fonctions et objets. Parfait pour commencer à programmer en JavaScript.',
            'formateur_id' => $formateur1->id, // Assign to John Doe
        ]);

        Autoformation::create([
            'title' => 'Techniques avancées de CSS',
            'description' => 'Découvrez les techniques avancées de CSS : mises en page réactives, animations, Flexbox, Grid et propriétés personnalisées. Parfait pour perfectionner vos compétences en design web.',
            'formateur_id' => $formateur2->id, // Assign to Jane Smith
            ]);
            Autoformation::create([
                'title' => 'HTML et CSS pour les Débutants',
                'description' => 'Apprenez les bases du HTML et du CSS : structure d’une page web, mise en forme, classes et sélecteurs. Idéal pour créer vos premiers sites web.',
                'formateur_id' => $formateur1->id, // Assign to John Doe
            ]);
            Autoformation::create([
               'title' => 'Programmation Orientée Objet en PHP',
                'description' => 'Découvrez les fondamentaux de la programmation orientée objet avec PHP : classes, objets, méthodes et héritage. Parfait pour aller plus loin dans le développement web.',
                'formateur_id' => $formateur2->id, // Assign to Jane Smith
            ]);
            Autoformation::create([
                'title' => 'Développement Android avec Kotlin',
                'description' => 'Apprenez les bases de Kotlin et débutez dans le développement d’applications Android. Idéal pour les débutants souhaitant créer des apps modernes.',
                'formateur_id' => $formateur1->id, // Assign to John Doe
            ]);
            
            Autoformation::create([
                'title' => 'Laravel : Framework PHP Efficace',
                'description' => 'Maîtrisez les fondamentaux de Laravel : routes, contrôleurs, migrations, Eloquent et Blade. Parfait pour développer des applications web en PHP de manière rapide et structurée.',
                'formateur_id' => $formateur2->id, // Assign to Jane Smith
            ]);
                
    }
}
