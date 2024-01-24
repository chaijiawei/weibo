@extends('layouts.app')

@section('title', '微博列表')

@section('content')
  <ul class="list-group">
    @foreach($microBlogs as $microBlog)
      <li class="list-group-item">
        {{ $microBlog->content }}
        <small class="ms-2 text-secondary">
          <span class="me-2">
            作者：
            <a class="text-decoration-none text-secondary" href="{{ route('users.show', $microBlog->user) }}">
              {{ $microBlog->user->name}}
            </a>
          </span>
          <span class="me-2">
            发布时间：
            {{ $microBlog->created_at->diffForHumans() }}
          </span>
        </small>
      </li>
    @endforeach
  </ul>
  <div class="my-4">
    {{ $microBlogs->links() }}
  </div>
@endsection