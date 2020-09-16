<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user, UsersRequest $request)
    {
        $data = $request->validated();

        $user->update($data);
        flash('资料修改成功')->success();
        return redirect()->route('users.show', $user);
    }

    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }
}
