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
            'titre' => 'JavaScript Fundamentals',
            'description' => 'Understand the basics of JavaScript.',
            'start_date' => '2025-01-01',
            'end_date' => '2025-03-01',
        ]);

        Autoformation::create([
            'titre' => 'Advanced CSS Techniques',
            'description' => 'Learn advanced CSS skills to build responsive designs.',
            'start_date' => '2025-02-01',
            'end_date' => '2025-04-01',
        ]);
    }
}
