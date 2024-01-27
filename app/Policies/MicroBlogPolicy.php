<?php

namespace App\Policies;

use App\Models\MicroBlog;
use App\Models\User;

class MicroBlogPolicy
{
    public function delete(User $user, MicroBlog $microBlog) {
        return $user->id === $microBlog->user_id;
    }
}
