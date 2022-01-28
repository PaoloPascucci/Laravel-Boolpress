@extends('layouts.app')

@section('content')
  

<div class="p-5 bg-dark text-white">
    <div class="container">
        <h1 class="display-3">Category: {{$category->name}}</h1> 
        <p class="lead">All posts of this category</p>
    </div>
</div>

<div class="container">
    <div class="row gy-2">
        @foreelse($posts as $post)

        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{$post->cover}}" alt="{{$post->title}}">
                <div class="card-body">
                    <h4 class="card-title">{{$post->title}}</h4>
                    <h5 class="card-title">{{$post->sub_title}}</h5>
                    <p class="card-text">{{$post->body}}</p>
                    <a href="{{route('posts.show', $post->slug)}}">View Post</a>
                </div>
            </div>
        </div>
        @empty
            <div class="col">
                Sorry! nothing to see here
            </div>
        @endempty
        @endforelse

    </div>
</div>



@endsection