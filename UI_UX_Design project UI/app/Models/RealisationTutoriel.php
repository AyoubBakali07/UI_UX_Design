<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealisationTutoriel extends Model
{
    public function apprenant()
    {
        return $this->belongsTo(Apprenant::class);
    }
    public function realisationAutoformation()
    {
        return $this->belongsTo(RealisationAutoformation::class);
    }
    public function tutoriel()
    {
        return $this->belongsTo(Tutoriel::class);
    }
}
