<?php

namespace Database\Seeders;

use App\Models\Autoformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AutoformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Autoformation::create([
            'title' => 'JavaScript Fundamentals',
            'tutoriel_id' => 1, // We'll need to create a tutoriel first
        ]);

        Autoformation::create([
            'title' => 'Advanced CSS Techniques',
            'tutoriel_id' => 2, // We'll need to create a tutoriel first
        ]);
        Autoformation::create([
            'title' => 'Advanced CSS Techniques',
            'tutoriel_id' => 3, // We'll need to create a tutoriel first
        ]);
            Autoformation::create([
                'title' => 'Advanced CSS Techniques',
                'tutoriel_id' => 4, // We'll need to create a tutoriel first
            ]);
            Autoformation::create([
                'title' => 'Advanced CSS Techniques',
                'tutoriel_id' => 5, // We'll need to create a tutoriel first
            ]);
            Autoformation::create([
                'title' => 'Advanced CSS Techniques',
                'tutoriel_id' => 6, // We'll need to create a tutoriel first
            ]);
            Autoformation::create([
                'title' => 'Advanced CSS Techniques',
                'tutoriel_id' => 7, // We'll need to create a tutoriel first
            ]);
            Autoformation::create([
                'title' => 'Advanced CSS Techniques',
                'tutoriel_id' => 8, // We'll need to create a tutoriel first
            ]);
            Autoformation::create([
                'title' => 'Advanced CSS Techniques',
                'tutoriel_id' => 9, // We'll need to create a tutoriel first
            ]);
            Autoformation::create([
                'title' => 'Advanced CSS Techniques',
                'tutoriel_id' => 10, // We'll need to create a tutoriel first
            ]);
    }
}
