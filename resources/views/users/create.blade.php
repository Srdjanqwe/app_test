@extends('layout')

@section('content')
    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        @include('users.form')

        <div><input class="mb-3" type="submit" value="Create" class="btn btn-primary btn-block"></div>

    </form>

@endsection
