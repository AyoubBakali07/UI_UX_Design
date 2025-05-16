<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'telephone',
        'user_id'
    ];

    /**
     * Get the user that owns the apprenant.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the autoformations for the apprenant.
     */
    public function autoformations()
    {
        return $this->belongsToMany(Autoformation::class, 'apprenant_autoformation')
                    ->withPivot('status', 'date_debut', 'date_fin')
                    ->withTimestamps();
    }

    /**
     * Get the realisations (completed projects) for the apprenant.
     */
    public function realisations()
    {
        return $this->hasMany(Realisation::class);
    }

    /**
     * Get the completed tutorials count.
     */
    public function getCompletedTutorialsCountAttribute()
    {
        return $this->autoformations()
                    ->wherePivot('status', 'completed')
                    ->count();
    }

    /**
     * Get the progress percentage.
     */
    public function getProgressAttribute()
    {
        $total = $this->autoformations()->count();
        if ($total === 0) return 0;
        
        $completed = $this->completed_tutorials_count;
        return round(($completed / $total) * 100);
    }
}
