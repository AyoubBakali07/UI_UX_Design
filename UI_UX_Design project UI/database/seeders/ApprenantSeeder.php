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

        Apprenant::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
            'groupe_id' => $groupeId,
        ]);

        Apprenant::create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'password' => bcrypt('password'),
            'groupe_id' => $groupeId,
        ]);
    }
}
