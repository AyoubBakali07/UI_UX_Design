<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    public function apprenants()
    {
        return $this->hasMany(Apprenant::class);
    }
}
