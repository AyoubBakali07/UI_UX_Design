<?php

namespace Database\Seeders;

use App\Models\Autoformation;
use App\Models\Formation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AutoformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formations = Formation::all();
        
        foreach ($formations as $formation) {
            $autoformationCount = rand(2, 4); // 2-4 autoformations per formation
            
            for ($i = 1; $i <= $autoformationCount; $i++) {
                Autoformation::create([
                    'titre' => "Module $i: " . $formation->titre,
                    'description' => "Self-paced module $i for " . $formation->titre,
                    'niveau' => $formation->niveau,
                    'duree' => rand(2, 8), // 2-8 hours
                    'formation_id' => $formation->id
                ]);
            }
        }
    }
}
