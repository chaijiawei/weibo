<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth')->only(['follow', 'unfollow']);
    }

    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {
        $data = $this->validate($request, [
            'name' => User::$rules['name'] . '|' . Rule::unique('users'),
            'email' => User::$rules['email'] . '|' . Rule::unique('users'),
            'password' => User::$rules['password'] . '|confirmed'
        ]);

        User::create($data);

        return to_route('home')->with('msg', '注册成功');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('home')->with('msg', '登出成功');
    }

    public function login() {
        return view('user.login');
    }

    public function storeLogin(Request $request) {
        $data = $this->validate($request, [
            'email' => User::$rules['email'],
            'password' => User::$rules['password'],
        ]);

        if(Auth::attempt($data)) {
            return redirect()->intended(route('home'))->with('msg', '登录成功');
        }

        return back()->withErrors([
            'email' => '账号或者密码错误'
        ])->onlyInput('email');
    }

    public function show(User $user) {
        $user->loadCount(['microBlogs', 'followers', 'followees']);
        return view('user.show', compact('user'));
    }

    public function edit(User $user) {
        $this->authorize('update', $user);

        return view('user.edit', compact('user'));
    }

    public function update(User $user, Request $request) {
        $this->authorize('update', $user);

        $data = $this->validate($request, [
            'name' => User::$rules['name'] . '|' . Rule::unique('users')->ignore($user),
        ]);

        $user->update($data);

        return to_route('users.edit', $user)->with('msg', '修改成功');
    }

    public function follow(User $user) {
        $this->authorize('follow', $user);

        Auth::user()->follow($user);

        return back();
    }

    public function unfollow(User $user) {
        $this->authorize('follow', $user);

        Auth::user()->unfollow($user);

        return back();
    }

    public function followers(User $user) {
        $followers = $user->followers()->orderByPivot('created_at', 'desc')->paginate();

        return view('user.followers', compact('followers', 'user'));
    }

    public function followees(User $user) {
        $followees = $user->followees()->orderByPivot('created_at', 'desc')->paginate();

        return view('user.followees', compact('followees', 'user'));
    }
}
