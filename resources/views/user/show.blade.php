@extends('layouts.app')

@section('title', "{$user->name}的主页")

@section('content')
  <h3>{{ $user->name }}</h3>
  <p>{{ $user->email }}</p>
@endsection