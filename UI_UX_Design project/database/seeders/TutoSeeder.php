<?php

namespace Database\Seeders;

use App\Models\Formation;
use App\Models\Tuto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formation = Formation::first();
        Tuto::create([
            'titre' => 'Introduction to HTML',
            'contenu' => 'This tutorial covers the basics of HTML structure.',
            'order' => 1,
            'progression' => 'En cours',
            'formation_id' => $formation->id, // Associate with the formation

        ]);

        Tuto::create([
            'titre' => 'CSS Basics',
            'contenu' => 'Learn how to style your HTML elements with CSS.',
            'order' => 2,
            'progression' => 'Terminée',
        ]);
    }
}
