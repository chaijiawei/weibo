@extends('layouts.app')

@section('title', '微博列表')

@section('content')
  <ul class="list-group">
    @foreach($microBlogs as $microBlog)
      @include('micro-blog._list')
    @endforeach
  </ul>
  <div class="my-4">
    {{ $microBlogs->links() }}
  </div>
@endsection