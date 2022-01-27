@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row gy-2">
        @foreach($posts as $post)

        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{$post->cover}}" alt="{{$post->title}}">
                <div class="card-body">
                    <h4 class="card-title">{{$post->title}}</h4>
                    <h4 class="card-title">{{$post->sub_title}}</h4>
                    <p class="card-text">{{$post->body}}</p>
                    <a href="{{route('posts.show', $post->slug)}}">View Post</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection
