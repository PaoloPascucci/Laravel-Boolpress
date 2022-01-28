@extends('layouts.app')


@section('content')
<div class="container">

    <img src="{{$post->cover}}" alt="{{$post->title}}">

    @auth
    <div class="actions">
        <a href="{{route('guest.posts.index')}}">Back to Admin</a>
    </div>
    @endauth 
    <h1 class="card-title">{{$post->title}}</h1>
    <h2 class="card-title">{{$post->sub_title}}</h2>
    <div class="metadata">
        <div class="category">
            @if ($post->category)
            Category: <a href="{{route('categories.posts', $post->category->slug)}}">
                {{ $post->category->name}}
            </a> 
            @else
                <span>'Uncategorized'</span>
            @endif
        </div>
      </div>
    <div class="content">
        <p>
            {{$post->body}}
        </p>
    </div>
</div>
@endsection