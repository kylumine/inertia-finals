<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function updateAboutMe(User $user)
    {
        return $user->id === auth()->id();
    }
}
