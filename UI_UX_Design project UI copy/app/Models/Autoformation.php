<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autoformation extends Model
{
    /**
     * Get the tutorials that belong to the Autoformation.
     */
    public function tutoriels()
    {
        return $this->hasMany(Tutoriel::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technologie::class, 'autoformation_technologie');
    }

    public function realisationAutoformations()
    {
        return $this->hasMany(RealisationAutoformation::class);
    }
}
