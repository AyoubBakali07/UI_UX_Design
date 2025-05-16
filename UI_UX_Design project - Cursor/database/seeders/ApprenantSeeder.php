<?php

namespace Database\Seeders;

use App\Models\Apprenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ApprenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'nom' => 'Alami',
                'prenom' => 'Mohammed',
                'email' => 'mohammed@example.com',
                'telephone' => '0612345678'
            ],
            [
                'nom' => 'Benani',
                'prenom' => 'Sara',
                'email' => 'sara@example.com',
                'telephone' => '0623456789'
            ],
            [
                'nom' => 'Chraibi',
                'prenom' => 'Karim',
                'email' => 'karim@example.com',
                'telephone' => '0634567890'
            ]
        ];

        foreach ($students as $student) {
            // Create user account
            $user = User::create([
                'name' => $student['prenom'] . ' ' . $student['nom'],
                'email' => $student['email'],
                'password' => Hash::make('password'),
                'role' => 'student'
            ]);

            // Create apprenant profile
            Apprenant::create([
                'user_id' => $user->id,
                'nom' => $student['nom'],
                'prenom' => $student['prenom'],
                'email' => $student['email'],
                'telephone' => $student['telephone']
            ]);
        }
    }
}
