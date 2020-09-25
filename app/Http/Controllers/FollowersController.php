<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function destroy(User $follower)
    {
        $this->authorize('follow', $follower);
        Auth::user()->unFollow($follower);
        return back();
    }

    public function store(Request $request)
    {
        $user = User::query()->findOrFail($request->user_id);
        $this->authorize('follow', $user);
        Auth::user()->follow($user);
        return back();
    }
}
