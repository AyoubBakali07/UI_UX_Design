<?php

namespace Database\Seeders;

use App\Models\Formation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instructors = User::where('role', 'instructor')->get();
        
        $formations = [
            [
                'titre' => 'Web Development Fundamentals',
                'description' => 'Learn the basics of web development including HTML, CSS, and JavaScript.',
                'niveau' => 'debutant'
            ],
            [
                'titre' => 'Advanced JavaScript Programming',
                'description' => 'Master advanced JavaScript concepts including ES6+, async programming, and design patterns.',
                'niveau' => 'avance'
            ],
            [
                'titre' => 'PHP & Laravel Development',
                'description' => 'Learn PHP programming and Laravel framework for building modern web applications.',
                'niveau' => 'intermediaire'
            ],
            [
                'titre' => 'Frontend Development with React',
                'description' => 'Build modern user interfaces with React.js and related technologies.',
                'niveau' => 'intermediaire'
            ]
        ];

        foreach ($formations as $formation) {
            Formation::create([
                'titre' => $formation['titre'],
                'description' => $formation['description'],
                'niveau' => $formation['niveau'],
                'instructor_id' => $instructors->random()->id
            ]);
        }
    }
}
