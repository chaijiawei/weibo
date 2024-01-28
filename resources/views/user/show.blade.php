@extends('layouts.app')

@section('title', "{$user->name}的主页")

@section('content')
  <h3>{{ $user->name }}</h3>
  <p>{{ $user->email }}</p>
  @can('follow', $user)
    @if(Auth::user() && Auth::user()->isFollow($user))
      <form method="post" action="{{ route('users.unfollow', $user) }}">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-primary">已关注</button>
      </form>
    @else
      <form method="post" action="{{ route('users.follow', $user) }}">
        @csrf
        <button type="submit" class="btn btn-primary">关注</button>
      </form>
    @endif
  @endcan
  <hr>
  <div class="row">
    <span class="col">
      <a href="{{ route('micro-blogs.userIndex', $user) }}">
        微博数量：{{ $user->micro_blogs_count }}
      </a>
    </span> 
    <span class="col">
      <a href="{{ route('users.followers', $user) }}">
        粉丝数量：{{ $user->followers_count }}
      </a>
    </span> 
    <span class="col">
      <a href="{{ route('users.followees', $user) }}">
        关注数量：{{ $user->followees_count }}
      </a>
    </span> 
  </div>
@endsection