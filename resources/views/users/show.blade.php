@extends('layout')

@section('content')
    <p>{{ $user->name }}</p>
    <p>{{ $user->unique }}</p>

@endsection('content')
