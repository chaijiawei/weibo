<?php

namespace App\Http\Controllers;

use App\Models\MicroBlog;
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
        $data = $this->validate($request, [
            'content' => 'required|string|min:1|max:255'
        ], [], [
            'content' => '微博内容'
        ]);

        $request->user()->microBlogs()->create($data);

        return back()->with(['msg' => '微博发布成功']);
    }
}
