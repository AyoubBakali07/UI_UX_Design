<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuto extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'contenu',
        'duree',
        'formation_id',
        'autoformation_id'
    ];

    /**
     * Get the formation that owns the tuto.
     */
    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    /**
     * Get the autoformation that owns the tuto.
     */
    public function autoformation()
    {
        return $this->belongsTo(Autoformation::class);
    }

    /**
     * Get the realisations for the tuto.
     */
    public function realisations()
    {
        return $this->hasMany(Realisation::class);
    }

    /**
     * Get the status label attribute.
     */
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'not_started' => 'Non commencé',
            'in_progress' => 'En cours',
            'completed' => 'Terminé',
            default => 'Non défini'
        };
    }
}
