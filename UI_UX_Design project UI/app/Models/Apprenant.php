<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apprenant extends Model
{
    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function realisationAutoformations()
    {
        return $this->hasMany(RealisationAutoformation::class);
    }

    public function realisationTutoriels()
    {
        return $this->hasMany(RealisationTutoriel::class);
    }

    // Get all apprenant names
    public static function getAllNames()
    {
        return self::pluck('name');
    }
}
