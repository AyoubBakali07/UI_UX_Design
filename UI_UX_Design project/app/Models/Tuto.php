<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tuto extends Model
{
    protected $fillable = ['titre', 'contenu', 'order', 'progression'];
    public function formation(){
        return $this->belongsTo(Formation::class);
    }
    public function realisation(){
        return $this->hasOne(Realisation::class);
    }
}
