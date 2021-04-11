@extends('layout')

@section('content')
<div class="row">
    <div class="col-8">
        <h1>{{ $posts->title }}</h1>

        @if($posts->image)
        <img src="{{ $posts->image->url() }}" style="max-height: 250px; max-width: 250px">
        @endif

        @if($posts->image)

        @else
        @endif

        <p>{{ $posts->content }}</p>

        {{-- <img src="{{ $posts->image->url() }}" /> --}}

        <x-updated date="{{ $posts->created_at->diffForHumans() }}" name="{{ $posts->user->name }}">
        </x-updated>

        <x-updated date="{{ $posts->updated_at->diffForHumans() }}">
            Updated
        </x-updated>

    </div>
</div>
@endsection('content')
