<?php

namespace App\Policies;

use App\Models\MicroBlog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MicroBlogPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy(User $user, MicroBlog $microBlog)
    {
        return $user->id === $microBlog->user_id;
    }
}
