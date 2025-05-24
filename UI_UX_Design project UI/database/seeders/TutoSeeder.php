<?php

namespace Database\Seeders;

use App\Models\Tutoriel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tutoriel::create([
            'title' => 'Introduction to HTML',
        ]);

        Tutoriel::create([
            'title' => 'CSS Basics',
        ]);
        Tutoriel::create([
            'title' => 'CSS Basics',
        ]);
        Tutoriel::create([
            'title' => 'CSS Basics',
        ]);
        Tutoriel::create([
            'title' => 'CSS Basics',
        ]);
        Tutoriel::create([
            'title' => 'CSS Basics',
        ]);
        Tutoriel::create([
            'title' => 'CSS Basics',
        ]);
        Tutoriel::create([
            'title' => 'CSS Basics',
        ]);
        Tutoriel::create([
            'title' => 'CSS Basics',
        ]);
        Tutoriel::create([
            'title' => 'CSS Basics',
        ]);
    }
}
