<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealisationAutoformation extends Model
{
    public function apprenant()
    {
        return $this->belongsTo(Apprenant::class);
    }
    public function autoformation()
    {
        return $this->belongsTo(Autoformation::class);
    }
    public function realisationTutoriels()
    {
        return $this->hasMany(RealisationTutoriel::class);
    }
}
