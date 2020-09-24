<?php

namespace App\Http\Controllers;

use App\Models\MicroBlog;
use Illuminate\Http\Request;

class MicroBlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'content' => ['required', 'string', 'max:255'],
        ]);
        $request->user()->microBlogs()->create($data);
        flash('微博创建成功')->success();
        return back();
    }

    public function destroy(MicroBlog $microBlog)
    {
        $this->authorize('destroy', $microBlog);
        $microBlog->delete();
        flash('删除成功')->success();
        return back();
    }
}
