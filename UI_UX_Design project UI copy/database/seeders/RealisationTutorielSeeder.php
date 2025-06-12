<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Apprenant;
use App\Models\Tutoriel;
use App\Models\Autoformation;
use App\Models\RealisationAutoformation;
use App\Models\RealisationTutoriel;

class RealisationTutorielSeeder extends Seeder
{
    public function run(): void
    {
        $apprenants     = Apprenant::all();
        $tutoriels      = Tutoriel::all();
        $autoformations = Autoformation::all();

        foreach ($apprenants as $apprenant) {
            // 1) First seed some realisations_autoformation as before
            $realAutoRecords = [];
            foreach ($autoformations as $auto) {
                $realAutoRecords[] = RealisationAutoformation::create([
                    'apprenant_id'     => $apprenant->id,
                    'autoformation_id' => $auto->id,
                    'status'           => 'encours',
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ]);
            }

            // 2) Pick a RANDOM NUMBER of tutoriels to mark as "termine"
            $numTermine = rand(3, min(8, $tutoriels->count())); 
            // e.g. between 3 and 8, but never more than you actually have

            $tutorielsTermine = $tutoriels->random($numTermine);

            foreach ($tutorielsTermine as $tuto) {
                // pick one of the realAutoRecords at random (or map 1:1 if you prefer)
                $realAuto = $realAutoRecords[array_rand($realAutoRecords)];

                RealisationTutoriel::create([
                    'apprenant_id'                 => $apprenant->id,
                    'realisation_autoformation_id' => $realAuto->id,
                    'tutoriel_id'                  => $tuto->id,
                    'etat'                         => 'termine',
                    'created_at'                   => now(),
                    'updated_at'                   => now(),
                ]);
            }

            // 3) (Optional) If you want, you can also mark some tutoriels as "encours" or "abandonne"
            //    by subtracting $tutorielsTermine from the full list:
            $remaining = $tutoriels->diff($tutorielsTermine);
            foreach ($remaining as $tuto) {
                // e.g. give 50% of the remainder a status of "encours"
                if (rand(0,1) === 1) {
                    RealisationTutoriel::create([
                        'apprenant_id'                 => $apprenant->id,
                        'realisation_autoformation_id' => $realAutoRecords[array_rand($realAutoRecords)]->id,
                        'tutoriel_id'                  => $tuto->id,
                        'etat'                         => 'encours',
                        'created_at'                   => now(),
                        'updated_at'                   => now(),
                    ]);
                }
                // you could also randomly assign some as "abandonne" if you like…
            }
        }
    }
}
