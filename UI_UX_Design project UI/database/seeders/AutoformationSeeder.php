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
            'title' => 'JavaScript Fundamentals',
            'description' => 'This is a description of the autoformation',
            'formateur_id' => $formateur1->id, // Assign to John Doe
        ]);

        Autoformation::create([
            'title' => 'Advanced CSS Techniques',
            'description' => 'This is a description of the autoformation',
            'formateur_id' => $formateur2->id, // Assign to Jane Smith
            ]);
    }
}
