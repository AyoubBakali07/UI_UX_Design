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
            ['name' => 'Mohamed El Amrani', 'email' => 'mohamed.elamrani@mail.com'],
            ['name' => 'Ayoub Benhaddou', 'email' => 'ayoub.benhaddou@mail.com'],
            ['name' => 'Fatima Zahra', 'email' => 'fatima.zahra@mail.com'],
            ['name' => 'Youssef El Mansouri', 'email' => 'youssef.elmansouri@mail.com'],
            ['name' => 'Samira Bennis', 'email' => 'samira.bennis@mail.com'],
            ['name' => 'Oussama El Idrissi', 'email' => 'oussama.elidrissi@mail.com'],
            ['name' => 'Khadija Moutawakil', 'email' => 'khadija.moutawakil@mail.com'],
            ['name' => 'Nabil Chaoui', 'email' => 'nabil.chaoui@mail.com'],
            ['name' => 'Salma Lahlou', 'email' => 'salma.lahlou@mail.com'],
            ['name' => 'Rachid Bouzid', 'email' => 'rachid.bouzid@mail.com'],
        ];
        

        foreach ($apprenants as $apprenant) {
            // Randomly assign to either DW104 or DM1
            $groupeId = rand(0, 1) ? $dw104->id : $dm1->id;
            
            Apprenant::create([
                'name' => $apprenant['name'],
                'email' => $apprenant['email'],
                'password' => Hash::make('password'),
                'groupe_id' => $groupeId,
            ]);
        }
    }
}
