<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RealisationTutoriel;
use App\Models\Apprenant;
use App\Models\Tutoriel;
use App\Models\RealisationAutoformation;

class RealisationTutorielSeeder extends Seeder
{
    public function run(): void
    {
        $apprenant1 = Apprenant::first();
        $apprenant2 = Apprenant::skip(1)->first();
        $tutoriel1 = Tutoriel::first();
        $tutoriel2 = Tutoriel::skip(1)->first();
        $realisationAutoformation1 = RealisationAutoformation::first();
        $realisationAutoformation2 = RealisationAutoformation::skip(1)->first();

        RealisationTutoriel::create([
            'apprenant_id' => $apprenant1?->id,
            'realisation_autoformation_id' => $realisationAutoformation1?->id,
            'tutoriel_id' => $tutoriel1?->id,
            'etat' => 'termine',
        ]);

        RealisationTutoriel::create([
            'apprenant_id' => $apprenant2?->id,
            'realisation_autoformation_id' => $realisationAutoformation2?->id,
            'tutoriel_id' => $tutoriel2?->id,
            'etat' => 'encours',
        ]);
    }
} 