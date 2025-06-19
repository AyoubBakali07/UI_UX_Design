<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formateur;
use App\Models\Groupe;
use Illuminate\Support\Facades\Hash;

class FormateurSeeder extends Seeder
{
    public function run(): void
    {
        // Create or get groupes
        $dw104 = Groupe::firstOrCreate(['name' => 'DW104']);
        $dm1 = Groupe::firstOrCreate(['name' => 'DM1']);

        // Create formateurs with groupe assignments
        Formateur::create([
            'name' => 'John Doe',
            'email' => 'formateur@mail.com',
            'password' => Hash::make('password'),
            'groupe_id' => $dw104->id
        ]);

        Formateur::create([
            'name' => 'Jane Smith',
            'email' => 'jane@mail.com',
            'password' => Hash::make('password'),
            'groupe_id' => $dm1->id
        ]);
    }
} 