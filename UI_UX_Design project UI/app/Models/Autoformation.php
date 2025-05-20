<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autoformation extends Model
{
    public function tutoriel()
    {
        return $this->belongsTo(Tutoriel::class);
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
