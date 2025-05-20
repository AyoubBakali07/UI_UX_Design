<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    public function technologies()
    {
        return $this->hasMany(Technologie::class);
    }
}
