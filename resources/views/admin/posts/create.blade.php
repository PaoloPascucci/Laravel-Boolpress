@extends('layouts.admin')

@section('content')

<h1>Create a new Product</h1>

@include('partials.errors')

    <form action="{{route('admin.posts.store')}}" method="post">
    @csrf

    <div class="mb-3">
        <label for="title "class="form-label">Titolo</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is_invalid @enderror" placeholder="Lenovo Laptop" aria-describedby="titleHelper">
        <small id="titleHelper" class="text-muted" value="{{old('title')}}">Type a title for your product</small>
        @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

    <div class="mb-3">
        <label for="cover "class="form-label">Cover</label>
        <input type="text" name="cover" id="cover" class="form-control @error('cover') is_invalid @enderror" placeholder="https://" aria-describedby="coverHelper">
        <small id="coverHelper" class="text-muted" value="{{old('cover')}}">Type a cover for your product</small>
        @error('cover')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

    <div class="mb-3">
        <label for="sub_title "class="form-label">Sottotitolo</label>
        <input type="number"  name="sub_title" id="sub_title" class="form-control @error('sub_title') is_invalid @enderror" placeholder="333" aria-describedby="sub_titleHelper">
        <small id="sub_titleHelper" class="text-muted" value="{{old('sub_title')}}">Type a sub_title for your product</small>
        @error('sub_title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>
<div class="mb-3">
    <label for="category_id" class="form-label">Categories</label>
    <select class="form-control @error('category_id') is_invalid @enderror" name="category_id" id="category_id">
        <option value="" selected>Select a category</option>
        @foreach ($categories as $category )
        <option value="{{$category->id}}">{{$category->name}}</option> 
        @endforeach
    </select>
</div>
    <div class="mb-3">
        <label for="body "class="form-label">Corpo</label>
        <textarea class="form-control @error('body') is_invalid @enderror" name="body" id="body" rows="5">{{old('body')}}</textarea>
        @error('body')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

    <button type="submit" class="btn btn-dark">Save</button>
    </form>

@endsection