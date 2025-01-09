<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = ['titre', 'description'];
    public function tutos(){
        return $this->hasMany(Tuto::class);
    }
    public function autoformations(){
        return $this->hasMany(Autoformation::class);
    }
}
