<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutoriel extends Model
{
    public function autoformation()
    {
        return $this->belongsTo(Autoformation::class);
    }
    public function realisationTutoriels()
    {
        return $this->hasMany(RealisationTutoriel::class);
    }
}
