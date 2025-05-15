<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description'
    ];

    /**
     * Get the autoformations for the formation.
     */
    public function autoformations()
    {
        return $this->hasMany(Autoformation::class);
    }

    public function tutos(){
        return $this->hasMany(Tuto::class);
    }
}
