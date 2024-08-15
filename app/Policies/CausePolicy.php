<?php

namespace App\Policies;

use App\Models\Cause;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Log;

class CausePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('cause-view-any');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Cause $cause): bool
    {
        return $user->hasPermission('cause-view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('cause-create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Cause $cause): bool
    {
        return $user->hasPermission('cause-update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Cause $cause): bool
    {
        return $user->hasPermission('cause-delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Cause $cause): bool
    {
        return $user->hasPermission('cause-delete');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Cause $cause): bool
    {
        return $user->hasPermission('cause-delete');
    }
}
