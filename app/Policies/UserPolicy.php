<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as AuthUser;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:User');
    }

    public function view(AuthUser $authUser): bool
    {
        return $authUser->can('View:User');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:User');
    }

    /**
     * Only a super_admin can edit another super_admin, otherwise a user with
     * Update:User could change their password or email and take over the account.
     */
    public function update(AuthUser $authUser, User $model): bool
    {
        if ($this->isProtectedSuperAdmin($authUser, $model)) {
            return false;
        }

        return $authUser->can('Update:User');
    }

    /**
     * A user can never delete their own account through the admin panel, even
     * with the Delete:User permission, to avoid accidental or malicious self-lockout.
     * Only a super_admin can delete another super_admin.
     */
    public function delete(AuthUser $authUser, User $model): bool
    {
        if ($authUser->is($model) || $this->isProtectedSuperAdmin($authUser, $model)) {
            return false;
        }

        return $authUser->can('Delete:User');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:User');
    }

    public function restore(AuthUser $authUser): bool
    {
        return $authUser->can('Restore:User');
    }

    public function forceDelete(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDelete:User');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:User');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:User');
    }

    public function replicate(AuthUser $authUser): bool
    {
        return $authUser->can('Replicate:User');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:User');
    }

    private function isProtectedSuperAdmin(AuthUser $authUser, User $model): bool
    {
        return $model->hasRole('super_admin') && ! $authUser->hasRole('super_admin');
    }
}
