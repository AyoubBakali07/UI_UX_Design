<?php

namespace Database\Seeders;

use App\Models\Realisation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RealisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Realisation::create([
            'date' => '2025-01-10',
            'status' => 'Completed',
            'commentaire' => 'Great experience completing this task!',
        ]);

        Realisation::create([
            'date' => '2025-01-15',
            'status' => 'Pending',
            'commentaire' => 'Still working on it.',
        ]);
    }
}
