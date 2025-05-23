<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RealisationAutoformation;
use App\Models\Apprenant;

class RealisationAutoformationSeeder extends Seeder
{
    public function run(): void
    {
        $apprenant1 = Apprenant::first();
        $apprenant2 = Apprenant::skip(1)->first();

        RealisationAutoformation::create([
            'apprenant_id' => $apprenant1?->id,
            'autoformation_id' => 1,
            // 'date' => '2025-01-10',
            'status' => 'termine',
            // 'commentaire' => 'Bien fait',
        ]);
        RealisationAutoformation::create([
            'apprenant_id' => $apprenant1?->id,
            'autoformation_id' => 2,
            // 'date' => '2025-01-10',
            'status' => 'termine',
            // 'commentaire' => 'Bien fait',
        ]);

        RealisationAutoformation::create([
            'apprenant_id' => $apprenant2?->id,
            'autoformation_id' => 2,
            // 'date' => '2025-01-15',
            'status' => 'encours',
            // 'commentaire' => 'En cours',
        ]);
    }
} 