@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center mb-4">
                    <h3>用户列表</h3>
                </div>
                <div class="list-group list-group-flush">
                    @foreach($users as $user)
                        <div class="list-group-item">
                            <a href="{{ route('users.show', $user) }}">
                                {{ $user->name }}
                            </a>
                            <small class="ml-3">{{ $user->email }}</small>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
