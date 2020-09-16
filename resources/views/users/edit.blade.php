@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        修改个人资料
                    </div>

                    <div class="card-body">

                        <form action="{{ route('users.update', $user) }}" method="post">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label for="name">用户名</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                            </div>

                            <button class="btn btn-primary">确认修改</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
