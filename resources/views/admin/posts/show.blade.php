@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
              <img src="{{$post->cover}}" class="card-img-top" alt="{{$post->title}}">
              <a name="shop" href="{{route('admin.posts.index')}}" role="button">back to back</a>
              <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <h6 class="card-text ">{{$post->sub_title}}</h6>
                <div class="metadata">
                  <div class="category">
                    Category: {{ $post->category!= null ? $post->category->name : 'Uncategorized'}}
                  </div>
                </div>
                <p class="card-text">{{$post->body}}</p>
              </div>
            </div>
        </div>
    </div>
@endsection