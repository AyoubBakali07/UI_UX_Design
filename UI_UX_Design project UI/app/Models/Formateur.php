<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Formateur extends Authenticatable
{
    use Notifiable;

    protected $guard = 'formateur';

    protected $fillable = [
        'name',
        'email',
        'password',
        'groupe_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function autoformations()
    {
        return $this->hasMany(Autoformation::class);
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
} 