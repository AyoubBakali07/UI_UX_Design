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
            ['name' => 'Alice Martin', 'email' => 'alice.martin@example.com'],
            ['name' => 'bob marley', 'email' => 'bob.marley@example.com'],
            ['name' => 'arthur luther', 'email' => 'arthur.luther@example.com'],
            ['name' => 'Bob Johnson', 'email' => 'bob.johnson@example.com'],
            ['name' => 'Clara Wilson', 'email' => 'clara.wilson@example.com'],
            ['name' => 'David Lee', 'email' => 'david.lee@example.com'],
            ['name' => 'Eva Brown', 'email' => 'eva.brown@example.com'],
            ['name' => 'Frank Harris', 'email' => 'frank.harris@example.com'],
            ['name' => 'Grace Lewis', 'email' => 'grace.lewis@example.com'],
            ['name' => 'Henry Clark', 'email' => 'henry.clark@example.com'],
        ];

        foreach ($apprenants as $apprenant) {
            Apprenant::create([
                'name' => $apprenant['name'],
                'email' => $apprenant['email'],
                'password' => bcrypt('password'),
                'groupe_id' => $groupeId,
            ]);
        }
    }
}
