<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technologie extends Model
{
    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }

    public function autoformations()
    {
        return $this->belongsToMany(Autoformation::class, 'autoformation_technologie');
    }
}
