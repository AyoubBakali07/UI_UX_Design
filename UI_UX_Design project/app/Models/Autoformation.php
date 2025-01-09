<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autoformation extends Model
{
    protected $fillable = ['titre', 'description', 'start_date', 'end_date'];
    public function apprenants(){
    return $this->belongsToMany(Apprenant::class, 'apprenant_autoformation');
    }
    public function realisations(){
        return $this->hasMany(Realisation::class);
    }
    public function formations(){
        return $this->belongsTo(Formation::class);  
    }
}
