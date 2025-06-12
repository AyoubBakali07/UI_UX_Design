<?php

namespace Database\Seeders;

use App\Models\Tutoriel;
use App\Models\Autoformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get autoformations by title
        $js = \App\Models\Autoformation::where('title', 'JavaScript Fondamentaux')->first();
        $php = \App\Models\Autoformation::where('title', 'Programmation Orientée Objet en PHP')->first();
        $laravel = \App\Models\Autoformation::where('title', 'Laravel : Framework PHP Efficace')->first();
        $kotlin = \App\Models\Autoformation::where('title', 'Développement Android avec Kotlin')->first();
        $html = \App\Models\Autoformation::where('title', 'HTML et CSS pour les Débutants')->first();
        $css = \App\Models\Autoformation::where('title', 'Techniques avancées de CSS')->first();

        // Tutorials for each autoformation
        $tutos = [
            $js?->id => [
                ['title' => 'Variables en JavaScript', 'contenu' => 'Contenu sur les variables JS', 'ordre' => 1, 'course_link' => 'https://www.w3schools.com/js/'],
                ['title' => 'Fonctions en JavaScript', 'contenu' => 'Contenu sur les fonctions JS', 'ordre' => 2, 'course_link' => 'https://www.w3schools.com/js/'],
                ['title' => 'Objets en JavaScript', 'contenu' => 'Contenu sur les objets JS', 'ordre' => 3, 'course_link' => 'https://www.w3schools.com/js/js_objects.asp'],
            ],
            $php?->id => [
                ['title' => 'Classes et Objets en PHP', 'contenu' => 'Contenu sur les classes et objets PHP', 'ordre' => 1, 'course_link' => 'https://www.w3schools.com/php/php_oop_classes_objects.asp'],
                ['title' => 'Héritage en PHP', 'contenu' => 'Contenu sur l\'héritage PHP', 'ordre' => 2, 'course_link' => 'https://www.w3schools.com/php/php_oop_inheritance.asp'],
            ],
            $laravel?->id => [
                ['title' => 'Introduction à Laravel', 'contenu' => 'Contenu sur l\'introduction à Laravel', 'ordre' => 1, 'course_link' => 'https://laravel.com/docs/10.x'],
                ['title' => 'Les Routes dans Laravel', 'contenu' => 'Contenu sur les routes Laravel', 'ordre' => 2, 'course_link' => 'https://laravel.com/docs/10.x/routing'],
                ['title' => 'Les Contrôleurs dans Laravel', 'contenu' => 'Contenu sur les contrôleurs Laravel', 'ordre' => 3, 'course_link' => 'https://laravel.com/docs/10.x/controllers'],
            ],
            $kotlin?->id => [
                ['title' => 'Introduction à Kotlin', 'contenu' => 'Contenu sur Kotlin', 'ordre' => 1, 'course_link' => 'https://kotlinlang.org/docs/home.html'],
                ['title' => 'Première App Android', 'contenu' => 'Contenu sur la première app Android', 'ordre' => 2, 'course_link' => 'https://developer.android.com/kotlin'],
            ],
            $html?->id => [
                ['title' => 'Introduction à HTML', 'contenu' => 'Contenu sur HTML', 'ordre' => 1, 'course_link' => 'https://www.w3schools.com/html/'],
                ['title' => 'CSS Basics', 'contenu' => 'Contenu sur CSS', 'ordre' => 2, 'course_link' => 'https://www.w3schools.com/css/'],
            ],
            $css?->id => [
                ['title' => 'Introduction à CSS', 'contenu' => 'Contenu sur CSS', 'ordre' => 1, 'course_link' => 'https://www.w3schools.com/css/'],
                ['title' => 'Flexbox', 'contenu' => 'Contenu sur Flexbox', 'ordre' => 2, 'course_link' => 'https://www.w3schools.com/css/css3_flexbox.asp'],
                ['title' => 'Grid', 'contenu' => 'Contenu sur Grid', 'ordre' => 3, 'course_link' => 'https://www.w3schools.com/css/css_grid.asp'],
            ],
        ];

        // Seed the tutorials
        foreach ($tutos as $autoformation_id => $tutorials) {
            // Skip if autoformation not found
            if (!$autoformation_id) continue;
            foreach ($tutorials as $tuto) {
                \App\Models\Tutoriel::create([
                    'title' => $tuto['title'],
                    'contenu' => $tuto['contenu'],
                    'ordre' => $tuto['ordre'],
                    'autoformation_id' => $autoformation_id,
                    'course_link' => $tuto['course_link'] ?? null,
                ]);
            }
        }
    }
}
