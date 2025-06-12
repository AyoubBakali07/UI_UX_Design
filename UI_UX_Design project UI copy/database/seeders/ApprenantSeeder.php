<?php

namespace Database\Seeders;

use App\Models\Apprenant;
use App\Models\Groupe;
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
        // Get the groupes
        $dw104 = Groupe::where('name', 'DW104')->first();
        $dm1 = Groupe::where('name', 'DM1')->first();

        $apprenants = [
            ['name' => 'Alice Martin', 'email' => 'alicemartin@mail.com'],
            ['name' => 'bob marley', 'email' => 'bobmarley@mail.com'],
            ['name' => 'arthur luther', 'email' => 'arthurluther@mail.com'],
            ['name' => 'Bob Johnson', 'email' => 'bobjohnson@mail.com'],
            ['name' => 'Clara Wilson', 'email' => 'clarawilson@mail.com'],
            ['name' => 'David Lee', 'email' => 'davidlee@mail.com'],
            ['name' => 'Eva Brown', 'email' => 'evabrown@mail.com'],
            ['name' => 'Frank Harris', 'email' => 'frankharris@mail.com'],
            ['name' => 'Grace Lewis', 'email' => 'gracelewis@mail.com'],
            ['name' => 'Henry Clark', 'email' => 'henryclark@mail.com'],
        ];

        foreach ($apprenants as $apprenant) {
            // Randomly assign to either DW104 or DM1
            $groupeId = rand(0, 1) ? $dw104->id : $dm1->id;
            
            Apprenant::create([
                'name' => $apprenant['name'],
                'email' => $apprenant['email'],
                'password' => Hash::make('password123'),
                'groupe_id' => $groupeId,
            ]);
        }
    }
}
