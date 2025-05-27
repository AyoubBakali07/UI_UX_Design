<?php

namespace Database\Seeders;

use App\Models\Apprenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApprenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a groupe
        $groupeId = DB::table('groupes')->insertGetId([
            'name' => 'Groupe A',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

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
            Apprenant::create([
                'name' => $apprenant['name'],
                'email' => $apprenant['email'],
                'password' => bcrypt('password123'),
                'groupe_id' => $groupeId,
            ]);
        }
    }
}
