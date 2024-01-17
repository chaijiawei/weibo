@extends('layouts.app')

@section('title', '用户注册')

@section('content')
  <form action="{{ route('users.store') }}" method="post">
    @include('layouts.errors')
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">用户名</label>
      <input value="{{ old('name') }}" type="text" id="name" name="name" class="form-control">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">邮箱</label>
      <input value="{{ old('email') }}" type="text" id="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">密码</label>
      <input type="password" id="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
      <label for="password_confirmation" class="form-label">确认密码</label>
      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
    </div>
    <button class="btn btn-primary" type="submit">注册</button>
  </form>
@endsection