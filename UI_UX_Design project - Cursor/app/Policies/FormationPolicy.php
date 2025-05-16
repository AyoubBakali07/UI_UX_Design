<?php

namespace App\Policies;

use App\Models\Formation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Formation $formation)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->role === 'instructor' || $user->role === 'admin';
    }

    public function update(User $user, Formation $formation)
    {
        return $user->id === $formation->instructor_id || $user->role === 'admin';
    }

    public function delete(User $user, Formation $formation)
    {
        return $user->id === $formation->instructor_id || $user->role === 'admin';
    }
} 