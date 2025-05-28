<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealisationTutoriel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'apprenant_id',
        'tutoriel_id',
        'realisation_autoformation_id',
        'etat',
        'notes',
        'github_link',
        'project_link',
        'slide_link'
    ];

    public function apprenant()
    {
        return $this->belongsTo(Apprenant::class);
    }
    public function realisationAutoformation()
    {
        return $this->belongsTo(RealisationAutoformation::class);
    }
    public function tutoriel()
    {
        return $this->belongsTo(Tutoriel::class);
    }
}
