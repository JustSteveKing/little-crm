<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\User;
use App\Models\Workspace;

final class WorkspacePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasVerifiedEmail();
    }

    public function view(User $user, Workspace $workspace): bool
    {
        if ( ! $user->hasVerifiedEmail()) {
            return false;
        }

        return $user->id === $workspace->user_id;
    }

    public function create(User $user): bool
    {
        return $user->hasVerifiedEmail();
    }

    public function update(User $user, Workspace $workspace): bool
    {
        if ( ! $user->hasVerifiedEmail()) {
            return false;
        }

        return $user->id === $workspace->user_id;
    }

    public function delete(User $user, Workspace $workspace): bool
    {
        if ( ! $user->hasVerifiedEmail()) {
            return false;
        }

        return $user->id === $workspace->user_id;
    }
}
