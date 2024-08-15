<?php

namespace App\Policies;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FeedbackPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('feedback-view-any');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Feedback $feedback): bool
    {
        return $user->hasPermission('feedback-view');
    }


    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Feedback $feedback): bool
    {
        return $user->hasPermission('feedback-update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Feedback $feedback): bool
    {
        return $user->hasPermission('feedback-delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Feedback $feedback): bool
    {
        return $user->hasPermission('feedback-delete');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Feedback $feedback): bool
    {
        return $user->hasPermission('feedback-delete');
    }
}
