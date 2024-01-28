@extends('layouts.app')

@section('title', "{$user->name} 的粉丝列表")

@section('content')
  <ul class="list-group">
    @foreach($followers as $follower)
      @include('user._list', ['user' => $follower])
    @endforeach
  </ul>

  <div class="my-4">
    {{ $followers->links() }}
  </div>
@endsection