@extends('layouts.app')

@section('title', '用户登录')

@section('content')
  <form action="{{ route('users.storeLogin') }}" method="post">
    @include('layouts.errors')
    @csrf

    <div class="mb-3">
      <label for="email" class="form-label">邮箱</label>
      <input value="{{ old('email') }}" type="text" id="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">密码</label>
      <input type="password" id="password" name="password" class="form-control">
    </div>
    <button class="btn btn-primary" type="submit">登录</button>
  </form>
@endsection