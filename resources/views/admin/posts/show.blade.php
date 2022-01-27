@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
              <img src="{{$post->cover}}" class="card-img-top" alt="{{$post->title}}">
              <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <h6 class="card-text ">{{$post->sub_title}}</h6>
                <p class="card-text">{{$post->body}}</p>
                <a name="shop" href="{{route('admin.posts.index')}}" role="button">back to back</a>
              </div>
            </div>
        </div>
    </div>
@endsection