<?php

namespace App\Http\Controllers;

use App\Models\MicroBlog;
use App\Models\User;
use Illuminate\Http\Request;

class MicroBlogController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth')->only('store');
    }

    public function index() {
        $microBlogs = MicroBlog::latest()->with('user')->paginate();

        return view('micro-blog.index', compact('microBlogs'));
    }

    public function store(Request $request) {
        $data = $this->validate($request, MicroBlog::$rules, [], MicroBlog::$rulesAttributes);

        $request->user()->microBlogs()->create($data);

        return back()->with(['msg' => '微博发布成功']);
    }

    public function userIndex(User $user) {
        $microBlogs = $user->microBlogs()->latest()->with('user')->paginate();

        return view('micro-blog.user_index', compact('microBlogs', 'user'));
    }

    public function destroy(MicroBlog $microBlog) {
        $this->authorize('delete', $microBlog);

        $microBlog->delete();

        return back();
    }
}
