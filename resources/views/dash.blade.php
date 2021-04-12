@extends('layout')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 45rpx">
            <div class="col-md-6 col-md-offset-3">
                <table class="table table-hover">
                    <h4>Dashboard</h4>
                        <hr>
                        <thead>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Published</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)

                            <tr>
                                <td><a href="{{ route('posts.show', ['post' =>$post->id]) }}">{{ $post->title ?? null}}</a></td>
                                <td><a href="{{ route('posts.show', ['post' =>$post->id]) }}">{{ $post->content ?? null}}</a></td>
                                <td>
                                    {{-- <div class="custom-control custom-switch">
                                        <input type="checkbox" checked="" class="custom-control-input" id="customSwitch4">
                                        <label class="custom-control-label" for="customSwitch4"></label> <span class="text-primary" id="valueOfSwitch4" ></span>
                                    </div> --}}
                                    <div class="form-check {{ $errors->has('is_published') ? 'is-invalid' : ''}}">
                                        <input class="form-check-input"
                                                    type="checkbox"
                                                    name="is_published"
                                                    id="is_published"
                                                    value="1" {{ $post->is_published || old('is_published', 0) === 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="is_published"></label>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection('content')
