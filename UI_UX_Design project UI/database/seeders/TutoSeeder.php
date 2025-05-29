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
        // Get all existing autoformations
        $autoformations = Autoformation::all();

        if ($autoformations->isEmpty()) {
            // Optional: Add a warning or create a default autoformation if none exist
            echo "Warning: No Autoformations found. Please run AutoformationSeeder first.\n";
            return;
        }

        // Seed Tutorials and associate them with Autoformations
        $tutorialsData = [
            ['title' => 'Introduction to HTML', 'contenu' => 'Content for HTML Intro', 'ordre' => 1],
            ['title' => 'CSS Basics', 'contenu' => 'Content for CSS Basics', 'ordre' => 2],
            ['title' => 'Responsive Design', 'contenu' => 'Content for Responsive Design', 'ordre' => 3],
            ['title' => 'Flexbox', 'contenu' => 'Content for Flexbox', 'ordre' => 4],
            ['title' => 'CSS Grid', 'contenu' => 'Content for CSS Grid', 'ordre' => 5],
            ['title' => 'JavaScript Variables', 'contenu' => 'Content for JS Variables', 'ordre' => 1],
            ['title' => 'JavaScript Data Types', 'contenu' => 'Content for JS Data Types', 'ordre' => 2],
            ['title' => 'JavaScript Operators', 'contenu' => 'Content for JS Operators', 'ordre' => 3],
            ['title' => 'JavaScript Conditionals', 'contenu' => 'Content for JS Conditionals', 'ordre' => 4],
            ['title' => 'JavaScript Loops', 'contenu' => 'Content for JS Loops', 'ordre' => 5],
        ];

        foreach ($tutorialsData as $data) {
            // Randomly select an autoformation to associate with
            $randomAutoformation = $autoformations->random();

        Tutoriel::create([
                'title' => $data['title'],
                'contenu' => $data['contenu'],
                'ordre' => $data['ordre'],
                'autoformation_id' => $randomAutoformation->id,
        ]);
        }
    }
}
