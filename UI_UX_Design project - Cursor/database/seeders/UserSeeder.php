<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Apprenant;
use App\Models\Formation;
use App\Models\Autoformation;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        // Create instructor user
        $instructor = User::create([
            'name' => 'Instructor User',
            'email' => 'instructor@example.com',
            'password' => Hash::make('password'),
            'role' => 'instructor'
        ]);

        // Create some test formations for the instructor
        $formation = Formation::create([
            'titre' => 'Formation Laravel',
            'description' => 'Une formation complète sur Laravel',
            'niveau' => 'intermediaire',
            'instructor_id' => $instructor->id
        ]);

        // Create some autoformations
        $autoformations = [
            [
                'titre' => 'Introduction à Laravel',
                'description' => 'Les bases de Laravel',
                'duree' => 2,
                'niveau' => 'debutant',
                'formation_id' => $formation->id
            ],
            [
                'titre' => 'Routing et Controllers',
                'description' => 'Gestion des routes et controllers',
                'duree' => 3,
                'niveau' => 'intermediaire',
                'formation_id' => $formation->id
            ]
        ];

        foreach ($autoformations as $af) {
            Autoformation::create($af);
        }

        // Create student users with their apprenant profiles
        $students = [
            [
                'name' => 'Jean Dupont',
                'email' => 'jean@example.com',
                'nom' => 'Dupont',
                'prenom' => 'Jean'
            ],
            [
                'name' => 'Marie Martin',
                'email' => 'marie@example.com',
                'nom' => 'Martin',
                'prenom' => 'Marie'
            ],
            [
                'name' => 'Lucas Bernard',
                'email' => 'lucas@example.com',
                'nom' => 'Bernard',
                'prenom' => 'Lucas'
            ],
            [
                'name' => 'Sophie Petit',
                'email' => 'sophie@example.com',
                'nom' => 'Petit',
                'prenom' => 'Sophie'
            ],
            [
                'name' => 'Antoine Dubois',
                'email' => 'antoine@example.com',
                'nom' => 'Dubois',
                'prenom' => 'Antoine'
            ]
        ];

        foreach ($students as $student) {
            $user = User::create([
                'name' => $student['name'],
                'email' => $student['email'],
                'password' => Hash::make('password'),
                'role' => 'student'
            ]);

            $apprenant = Apprenant::create([
                'nom' => $student['nom'],
                'prenom' => $student['prenom'],
                'email' => $student['email'],
                'telephone' => '0600000000',
                'user_id' => $user->id
            ]);

            // Assign some autoformations to students with different progress statuses
            $autoformations = Autoformation::all();
            foreach ($autoformations as $index => $autoformation) {
                if (rand(0, 1)) {
                    $status = ['not_started', 'in_progress', 'completed'][rand(0, 2)];
                    $apprenant->autoformations()->attach($autoformation->id, [
                        'status' => $status,
                        'date_debut' => now()->subDays(rand(1, 30)),
                        'date_fin' => $status === 'completed' ? now()->subDays(rand(1, 5)) : null
                    ]);
                }
            }
        }
    }
} 