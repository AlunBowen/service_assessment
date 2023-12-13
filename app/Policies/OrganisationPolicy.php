<?php

namespace App\Policies;

use App\Models\Organisation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrganisationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        error_log("viewAny");
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Organisation $organisation): bool
    {
        return $user->name === "Alun";
            // ? Response::allow()
            // : Response::deny('You do not own this organisation.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Organisation $organisation): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Organisation $organisation): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Organisation $organisation): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Organisation $organisation): bool
    {
        //
    }
}
