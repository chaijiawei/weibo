<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function show(User $user)
    {
        $microBlogs = $user->microBlogs()->latest()->paginate();
        return view('users.show', compact('user', 'microBlogs'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(User $user, UsersRequest $request)
    {
        $this->authorize('update', $user);
        $data = $request->validated();

        $user->update($data);
        flash('资料修改成功')->success();
        return redirect()->route('users.show', $user);
    }

    public function index()
    {
        $users = User::query()->paginate();

        return view('users.index', compact('users'));
    }

    public function followers(User $user)
    {
        $users = $user->followers()->latest()->paginate();
        $title = "{$user->name}的粉丝";

        return view('users.follow', compact('users', 'title'));
    }

    public function followings(User $user)
    {
        $users = $user->followings()->latest()->paginate();
        $title = "{$user->name}关注的人";

        return view('users.follow', compact('users', 'title'));
    }
}
