@extends('layouts.app')

@section('content')
<h1>Spa Blog</h1>

<div class="card text-left m-4" v-for="post in posts">
<img class="card-img-top" :src="'/storage/' + post.cover" alt="">
    <div class="card-body">
        <h4 class="card-title">@{{post.title}}</h4>
        <p class="card-text">@{{post.body}}</p>
        <p v-if="post.category">@{{post.category.name}}</p>
        <template v-if="post.tag">
            <p v-for="tag in tags">@{{tag.name}}</p>
        </template>
    </div>
</div>
@endsection