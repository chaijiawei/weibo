@extends('layouts.app')

@section('title', '首页')

@section('content')
  <form action="{{ route('micro-blogs.store') }}" method="post">
    @include('layouts.errors')
    @csrf

    <div class="mb-3">
      <label for="content" class="form-label">请发表您的见解...</label>
      <textarea class="form-control" name="content" id="content" rows="5">{{ old('content') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">发布</button>
  </form>
@endsection