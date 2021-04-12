@extends('layout')

@section('content')
<div class="row">
    <div class="col-8">
            @forelse ($posts as $post)
                    <p>
                        <h3>
                            @if($post->trashed())
                                <del>
                            @endif
                            <h1><a class="{{ $post->trashed() ? 'text-muted' : ''}}"
                                href="{{ route('posts.show', ['post'=> $post->id]) }}">{{ $post->title }}</a></h1>


                                <p><a class="{{ $post->trashed() ? 'text-muted' : ''}}"
                                href="{{ route('posts.show', ['post'=> $post->id]) }}">{{ $post->content }}</a></p>
                            @if($post->trashed())
                                </del>
                            @endif
                        </h3>

                        <x-updated date="{{ $post->updated_at->diffForHumans() }}" name="{{ $post->user->name }}" userId="{{ $post->user->id }}">
                        </x-updated>

                        <div class="mb-3">
                            @auth
                                @can('update', $post)
                                    <a href="{{ route('posts.edit', ['post'=> $post->id]) }}" class="btn btn-primary">Edit</a>
                                @endcan
                            @endauth

                            @auth
                                @if(!$post->trashed())
                                    @can('delete', $post)
                                        <form class="d-inline" action="{{ route('posts.destroy', ['post'=> $post->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <input type="submit" value="Delete" class="btn btn-primary">
                                        </form>
                                    @endcan
                                @endif
                            @endauth
                        </div>

                    </p>
                @empty
                    <p>No Blog post yet!</p>
                @endforelse

    </div>
</div>
@endsection('content')
