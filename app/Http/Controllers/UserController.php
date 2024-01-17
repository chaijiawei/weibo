<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
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

    public function login() {
        return view('user.login');
    }

    public function storeLogin(Request $request) {
        $data = $this->validate($request, [
            'email' => User::$rules['email'],
            'password' => User::$rules['password'],
        ]);

        if(Auth::attempt($data)) {
            return to_route('home')->with('msg', '登录成功');
        }

        return back()->withErrors([
            'email' => '账号或者密码错误'
        ])->onlyInput('email');
    }
}
