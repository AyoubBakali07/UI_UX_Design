<?php
// database/seeders/TutoSeeder.php

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
        $js = \App\Models\Autoformation::where('title', 'JavaScript Fondamentaux')->first();
        $php = \App\Models\Autoformation::where('title', 'POO en PHP')->first();
        $css = \App\Models\Autoformation::where('title', 'Techniques avancées de CSS')->first();
        $html = \App\Models\Autoformation::where('title', 'HTML & CSS pour Débutants')->first();
        $android = \App\Models\Autoformation::where('title', 'Android & Kotlin')->first();
        $laravel = \App\Models\Autoformation::where('title', 'Laravel : Framework PHP')->first();
        $python = \App\Models\Autoformation::where('title', 'Python : Bases & Avancées')->first();
        $vue = \App\Models\Autoformation::where('title', 'Vue.js : Frontend Moderne')->first();
        $node = \App\Models\Autoformation::where('title', 'Node.js & Express')->first();
        $docker = \App\Models\Autoformation::where('title', 'Docker & Orchestration')->first();
        $symfony = \App\Models\Autoformation::where('title', 'Symfony : Framework PHP')->first();
        $react = \App\Models\Autoformation::where('title', 'React : Interfaces Dynamiques')->first();

        $tutos = [
            $js?->id => [
                ['title' => 'Variables en JS', 'contenu' => 'Concepts de base', 'ordre' => 1, 'course_link' => 'https://www.w3schools.com/js/js_variables.asp'],
                ['title' => 'Fonctions en JS', 'contenu' => 'Définitions et usages', 'ordre' => 2, 'course_link' => 'https://www.w3schools.com/js/js_functions.asp'],
                ['title' => 'Objets en JS', 'contenu' => 'Propriétés et méthodes', 'ordre' => 3, 'course_link' => 'https://www.w3schools.com/js/js_objects.asp'],
            ],
            $php?->id => [
                ['title' => 'Classes & Objets', 'contenu' => 'Déclaration et instanciation', 'ordre' => 1, 'course_link' => 'https://www.w3schools.com/php/php_oop_classes_objects.asp'],
                ['title' => 'Héritage', 'contenu' => 'extends & parent', 'ordre' => 2, 'course_link' => 'https://www.w3schools.com/php/php_oop_inheritance.asp'],
                ['title' => 'Interfaces & Traits', 'contenu' => 'Contrats et réutilisation', 'ordre' => 3, 'course_link' => 'https://www.php.net/manual/fr/language.oop5.traits.php'],
            ],
            $css?->id => [
                ['title' => 'Flexbox', 'contenu' => 'Layout flexible', 'ordre' => 1, 'course_link' => 'https://www.w3schools.com/css/css_flexbox.asp'],
                ['title' => 'Grid', 'contenu' => 'Mise en page avancée', 'ordre' => 2, 'course_link' => 'https://www.w3schools.com/css/css_grid.asp'],
                ['title' => 'Animations CSS', 'contenu' => 'Transitions & keyframes', 'ordre' => 3, 'course_link' => 'https://www.w3schools.com/css/css3_animations.asp'],
            ],
            $html?->id => [
                ['title' => 'Structure HTML', 'contenu' => 'Balises de base', 'ordre' => 1, 'course_link' => 'https://www.w3schools.com/html/html_intro.asp'],
                ['title' => 'Sélecteurs CSS', 'contenu' => 'Ciblage des éléments', 'ordre' => 2, 'course_link' => 'https://www.w3schools.com/css/css_selectors.asp'],
                ['title' => 'Formulaires HTML', 'contenu' => 'Inputs & validation', 'ordre' => 3, 'course_link' => 'https://www.w3schools.com/html/html_forms.asp'],
            ],
            $android?->id => [
                ['title' => 'Intro Kotlin', 'contenu' => 'Syntaxe & types', 'ordre' => 1, 'course_link' => 'https://kotlinlang.org/docs/home.html'],
                ['title' => 'Première App', 'contenu' => 'UI de base', 'ordre' => 2, 'course_link' => 'https://developer.android.com/kotlin'],
                ['title' => 'Activités & Intents', 'contenu' => 'Navigation', 'ordre' => 3, 'course_link' => 'https://developer.android.com/guide/components/intents-filters'],
            ],
            $laravel?->id => [
                ['title' => 'Routes', 'contenu' => 'Définir des endpoints', 'ordre' => 1, 'course_link' => 'https://laravel.com/docs/10.x/routing'],
                ['title' => 'Contrôleurs', 'contenu' => 'Logique métier', 'ordre' => 2, 'course_link' => 'https://laravel.com/docs/10.x/controllers'],
                ['title' => 'Eloquent', 'contenu' => 'ORM Laravel', 'ordre' => 3, 'course_link' => 'https://laravel.com/docs/10.x/eloquent'],
            ],
            $python?->id => [
                ['title' => 'Intro Python', 'contenu' => 'Syntaxe & types', 'ordre' => 1, 'course_link' => 'https://www.w3schools.com/python/python_intro.asp'],
                ['title' => 'Variables Python', 'contenu' => 'Définitions et usages', 'ordre' => 2, 'course_link' => 'https://www.w3schools.com/python/python_variables.asp'],
                ['title' => 'Fonctions Python', 'contenu' => 'Définitions et usages', 'ordre' => 3, 'course_link' => 'https://www.w3schools.com/python/python_functions.asp'],
            ],
            $vue?->id => [
                ['title' => 'Intro Vue', 'contenu' => 'Syntaxe & types', 'ordre' => 1, 'course_link' => 'https://www.w3schools.com/vue/vue_intro.asp'],
                ['title' => 'Variables Vue', 'contenu' => 'Définitions et usages', 'ordre' => 2, 'course_link' => 'https://www.w3schools.com/vue/vue_variables.asp'],
                ['title' => 'Fonctions Vue', 'contenu' => 'Définitions et usages', 'ordre' => 3, 'course_link' => 'https://www.w3schools.com/vue/vue_functions.asp'],
            ],
            $node?->id => [
                ['title' => 'Intro Node', 'contenu' => 'Syntaxe & types', 'ordre' => 1, 'course_link' => 'https://www.w3schools.com/nodejs/nodejs_intro.asp'],
                ['title' => 'Variables Node', 'contenu' => 'Définitions et usages', 'ordre' => 2, 'course_link' => 'https://www.w3schools.com/nodejs/nodejs_variables.asp'],
                ['title' => 'Fonctions Node', 'contenu' => 'Définitions et usages', 'ordre' => 3, 'course_link' => 'https://www.w3schools.com/nodejs/nodejs_functions.asp'],
            ],
            $docker?->id => [
                ['title' => 'Intro Docker', 'contenu' => 'Syntaxe & types', 'ordre' => 1, 'course_link' => 'https://www.w3schools.com/docker/docker_intro.asp'],
                ['title' => 'Variables Docker', 'contenu' => 'Définitions et usages', 'ordre' => 2, 'course_link' => 'https://www.w3schools.com/docker/docker_variables.asp'],
                ['title' => 'Fonctions Docker', 'contenu' => 'Définitions et usages', 'ordre' => 3, 'course_link' => 'https://www.w3schools.com/docker/docker_functions.asp'],
            ],
            $symfony?->id => [
                ['title' => 'Intro Symfony', 'contenu' => 'Syntaxe & types', 'ordre' => 1, 'course_link' => 'https://www.w3schools.com/symfony/symfony_intro.asp'],
                ['title' => 'Variables Symfony', 'contenu' => 'Définitions et usages', 'ordre' => 2, 'course_link' => 'https://www.w3schools.com/symfony/symfony_variables.asp'],
                ['title' => 'Fonctions Symfony', 'contenu' => 'Définitions et usages', 'ordre' => 3, 'course_link' => 'https://www.w3schools.com/symfony/symfony_functions.asp'],
            ],
            $react?->id => [
                ['title' => 'Intro React', 'contenu' => 'Syntaxe & types', 'ordre' => 1, 'course_link' => 'https://www.w3schools.com/react/react_intro.asp'],
                ['title' => 'Variables React', 'contenu' => 'Définitions et usages', 'ordre' => 2, 'course_link' => 'https://www.w3schools.com/react/react_variables.asp'],
                ['title' => 'Fonctions React', 'contenu' => 'Définitions et usages', 'ordre' => 3, 'course_link' => 'https://www.w3schools.com/react/react_functions.asp'],
            ],
        ];


        foreach ($tutos as $autoformationId => $tutoList) {
            if (!$autoformationId) continue;
            foreach ($tutoList as $tuto) {
                \App\Models\Tutoriel::create([
                    'title' => $tuto['title'],
                    'contenu' => $tuto['contenu'],
                    'ordre' => $tuto['ordre'],
                    'course_link' => $tuto['course_link'],
                    'autoformation_id' => $autoformationId,
                ]);
            }
        }
    }
}
