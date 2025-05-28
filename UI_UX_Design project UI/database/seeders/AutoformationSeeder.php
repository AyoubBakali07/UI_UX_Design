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
            'description' => 'This is a description of the autoformation',
        ]);

        Autoformation::create([
            'title' => 'Advanced CSS Techniques',
            'description' => 'This is a description of the autoformation',
        ]);
    }
}
