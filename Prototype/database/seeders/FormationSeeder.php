<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Formation::create([
            'titre' => 'Full-Stack Web Development',
            'description' => 'Learn front-end and back-end web development in this comprehensive course.',
        ]);

        Formation::create([
            'titre' => 'UI/UX Design Bootcamp',
            'description' => 'Master the art of creating user-friendly interfaces.',
        ]);
    }
}
