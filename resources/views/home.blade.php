@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
            <div class="row">
                <div class="col-md-8">
                    <form action="{{ route('microBlogs.store') }}" method="post">
                        @csrf
                        @include('common._errors')
                        <div class="form-group">
                            <textarea class="form-control" name="content" rows="5" placeholder="来发表您的看法..."></textarea>
                        </div>
                        <button class="btn btn-primary">发布</button>
                    </form>
                    <div class="mt-4">
                        <h3>微博动态</h3>
                    </div>
                    <hr>
                    @include('microBlogs._list')
                </div>
                <div class="col-md-4">
                    <div class="text-center mb-4">
                        <h3>{{ Auth::user()->name }}</h3>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                    @include('users._status', ['user' => Auth::user()])
                </div>
            </div>
        @else
            <div class="jumbotron">
                <p>hello weibo</p>
            </div>
        @endauth
    </div>

@endsection
