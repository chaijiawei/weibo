@extends('layouts.app')

@section('title', '修改资料')

@section('content')
  <form action="{{ route('users.update', $user) }}" method="post">
    @include('layouts.errors')
    @csrf
    @method('patch')

    <div class="mb-3">
      <label for="name" class="form-label">用户名</label>
      <input value="{{ old('name', $user->name) }}" type="text" id="name" name="name" class="form-control">
    </div>
    <button class="btn btn-primary" type="submit">修改</button>
  </form>
@endsection