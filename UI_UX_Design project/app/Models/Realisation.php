<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Realisation extends Model
{
    protected $fillable = ['date', 'status', 'commentaire'];
    public function autoformation(){
        return $this->belongsTo(Autoformation::class);
    }
    public function tuto(){
        return $this->belongsTo(Tuto::class);
    }
}
