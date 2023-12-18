<?php

namespace App\Policies;

use App\Models\Organisation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrganisationPolicy
{

    public function before(User $user)
    {
        if ($user->hasRole('super-admin')) {
            return true;
        }
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->hasRole('cdps-admin')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Organisation $organisation): bool
    {
        if ($user->organisation==$organisation || $user->hasRole('cdps-admin')) {
            return true;
        }
        return false;
            
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
       
        return $user->hasRole('cdps-admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Organisation $organisation): bool
    {
        if ($user->organisation==$organisation || $user->hasRole('cdps-admin')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Organisation $organisation): bool
    {
        if ($user->organisation==$organisation || $user->hasRole('cdps-admin')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Organisation $organisation): bool
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, Organisation $organisation): bool
    // {
    //     //
    // }
}
