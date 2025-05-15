<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autoformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'niveau',
        'duree'
    ];

    /**
     * Get the apprenants for the autoformation.
     */
    public function apprenants()
    {
        return $this->belongsToMany(Apprenant::class, 'apprenant_autoformation')
                    ->withPivot('status', 'date_debut', 'date_fin')
                    ->withTimestamps();
    }

    /**
     * Get the formation that owns the autoformation.
     */
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    /**
     * Get the tutos for the autoformation.
     */
    public function tutos()
    {
        return $this->hasMany(Tuto::class);
    }

    /**
     * Get the level label attribute.
     */
    public function getLevelLabelAttribute()
    {
        return match($this->niveau) {
            'debutant' => 'Débutant',
            'intermediaire' => 'Intermédiaire',
            'avance' => 'Avancé',
            default => 'Non défini'
        };
    }
}
