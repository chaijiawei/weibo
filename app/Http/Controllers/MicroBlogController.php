<?php

namespace App\Http\Controllers;

use App\Models\MicroBlog;
use Illuminate\Http\Request;

class MicroBlogController extends Controller
{
    public function index() {
        $microBlogs = MicroBlog::latest()->with('user')->paginate();

        return view('micro-blog.index', compact('microBlogs'));
    }
}
