@extends('layouts.app')

@section('content')
<h1>Spa Blog</h1>

<div class="card text-left m-4" v-for="post in posts">
<img class="card-img-top" src="holder.js/100px180/" alt="">
    <div class="card-body">
        <h4 class="card-title">@{{post.title}}</h4>
        <p class="card-text">@{{post.body}}</p>
    </div>
</div>
@endsection