@extends('layouts.app')

@section('title', "{$user->name} 的关注列表")

@section('content')
  <ul class="list-group">
    @foreach($followees as $followee)
      @include('user._list', ['user' => $followee])
    @endforeach
  </ul>

  <div class="my-4">
    {{ $followees->links() }}
  </div>
@endsection