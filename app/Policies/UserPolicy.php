<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function update(User $user, User $targetUser) {
        return $user->getKey() === $targetUser->getKey();
    }
}
