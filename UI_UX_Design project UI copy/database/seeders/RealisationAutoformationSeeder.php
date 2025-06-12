<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RealisationAutoformation;
use App\Models\Apprenant;
use App\Models\Autoformation;

class RealisationAutoformationSeeder extends Seeder
{
    public function run(): void
    {
        $apprenants     = Apprenant::all();
        $autoformations = Autoformation::all();

        // Définir les statuts possibles
        $statuses = ['termine', 'encours'];

        foreach ($apprenants as $apprenant) {
            foreach ($autoformations as $auto) {
                RealisationAutoformation::create([
                    'apprenant_id'     => $apprenant->id,
                    'autoformation_id' => $auto->id,
                    'status'           => $statuses[array_rand($statuses)],
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ]);
            }
        }
    }
}
