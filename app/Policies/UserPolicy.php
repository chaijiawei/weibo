<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function update(User $user, User $targetUser) {
        return $user->id === $targetUser->id;
    }

    public function follow(?User $user, User $targetUser) {
        if(!$user) {
            return true;
        }
        return $user->id !== $targetUser->id;
    }
}
