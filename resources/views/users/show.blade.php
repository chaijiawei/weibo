@extends('layouts.app')

@section('title', '个人中心')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1>{{ $user->name }}</h1>
                <p>{{ $user->email }}</p>

            </div>
        </div>
    </div>
@endsection
