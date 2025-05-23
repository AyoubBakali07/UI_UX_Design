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
    }
}
