<?php

namespace App\Policies;

use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SubscriberPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['Super Admin', 'Admin', 'Editor', 'Viewer']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Subscriber $subscriber): bool
    {
        if ($user === null) {
            return false;
        }

        return $user->can('View Subscribers');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(['Super Admin', 'Admin']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Subscriber $subscriber): bool
    {
        return $user->hasRole(['Super Admin', 'Admin']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Subscriber $subscriber): bool
    {
        return $user->hasRole(['Super Admin', 'Admin']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Subscriber $subscriber): bool
    {
        return $user->hasRole(['Super Admin', 'Admin']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Subscriber $subscriber): bool
    {
        return $user->hasRole(['Super Admin', 'Admin']);
    }
}
