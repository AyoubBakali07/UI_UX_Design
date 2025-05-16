<?php

namespace Database\Seeders;

use App\Models\Tuto;
use App\Models\Autoformation;
use Illuminate\Database\Seeder;

class TutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $autoformations = Autoformation::with('formation')->get();
        
        foreach ($autoformations as $autoformation) {
            $tutorialCount = rand(3, 6); // 3-6 tutorials per autoformation
            
            for ($i = 1; $i <= $tutorialCount; $i++) {
                Tuto::create([
                    'titre' => "Lesson $i: " . $autoformation->titre,
                    'description' => "Tutorial lesson $i for " . $autoformation->titre,
                    'contenu' => $this->generateContent(),
                    'duree' => rand(30, 120), // 30-120 minutes
                    'formation_id' => $autoformation->formation_id,
                    'autoformation_id' => $autoformation->id
                ]);
            }
        }
    }

    private function generateContent(): string
    {
        $paragraphs = [
            "This lesson covers the fundamental concepts and practical applications.",
            "We'll explore various techniques and best practices in this tutorial.",
            "Through hands-on exercises, you'll learn how to implement these concepts.",
            "By the end of this lesson, you'll be able to create your own solutions.",
            "Practice exercises and real-world examples are included in this tutorial."
        ];

        return $paragraphs[array_rand($paragraphs)] . "\n\n" . 
               $paragraphs[array_rand($paragraphs)] . "\n\n" .
               $paragraphs[array_rand($paragraphs)];
    }
}
