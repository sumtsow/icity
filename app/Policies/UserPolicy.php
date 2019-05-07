<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user are admin.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function admin(User $user)
    {
        return $user->role === 'administrator';
    }
    
    public function manager(User $user)
    {
        return $user->role === 'manager';
    }
    
    public function operator(User $user)
    {
        return $user->role === 'operator';
    }

    public function client(User $user)
    {
        return $user->role === 'client';
    }
}