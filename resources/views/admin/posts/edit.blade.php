@extends('layouts.admin')

@section('content')

<h1>Update Post</h1>

@include('partials.errors')

    <form action="{{route('admin.posts.update', $post->id)}}" method="post">
    @csrf
    @method('PUT')
<div class="mb-3">
    <label for="title "class="form-label @error('title') is_invalid @enderror">Titolo</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Lenovo Laptop" aria-describedby="titleHelper">
    <small id="titleHelper" class="text-muted" value="{{old('$post->title')}}">Type a title for your product</small>
    @error('title')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>

<div class="mb-3">
    <label for="cover "class="form-label @error('cover') is_invalid @enderror">Cover</label>
    <img width="100" src="{{$post->cover}}">
    <input type="text" name="cover" id="cover" class="form-control" placeholder="https://" aria-describedby="coverHelper">
    <small id="coverHelper" class="text-muted" value="{{old('$post->cover')}}">Type a cover for your product</small>
    @error('cover')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>

<div class="mb-3">
    <label for="sub_title "class="form-label @error('sub_title') is_invalid @enderror">Sottotitolo</label>
    <input type="number"  name="sub_title" id="sub_title" class="form-control" placeholder="333" aria-describedby="sub_titleHelper">
    <small id="sub_titleHelper" class="text-muted" value="{{old('$post->sub_title')}}">Type a sub_title for your product</small>
    @error('sub_title')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
    <label for="category_id" class="form-label @error('category_id') is_invalid @enderror">Categories</label>
    <select class="form-control @error('category_id') is_invalid @enderror" name="category_id" id="category_id">
        <option value="">Uncategorized</option>
        @foreach ($categories as $category )
        <option value="{{$category->id}}" {{$category->id === $post->category_id ? 'selected' : ''}}>{{$category->name}}</option> 
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="body "class="form-label @error('body') is_invalid @enderror">Corpo</label>
    <textarea class="form-control" name="body" id="body" rows="5">{{old('$post->body')}}</textarea>
    @error('body')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>

<button type="submit" class="btn btn-dark">Save</button>
</form>

@endsection