@extends('layouts.app')

@section('title', '个人中心')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center">
                    <h1>{{ $user->name }}</h1>
                    <p>{{ $user->email }}</p>
                </div>

                @can('follow', $user)
                    <div class="text-center my-4">
                        @include('users._follow_form')
                    </div>
                @endcan

                <hr>
                @include('microBlogs._list')
            </div>
        </div>
    </div>
@endsection
