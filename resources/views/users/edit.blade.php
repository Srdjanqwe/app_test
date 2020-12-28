@extends('layout')

@section('content')
    <form method="POST"
          action="{{ route('users.update', ['user'=>$user->id]) }}">
        @csrf
        @method('PUT')

        @include('users.form')

        <div><input type="submit" value="Update" class="btn btn-primary btn-block"></div>

    </form>

@endsection
