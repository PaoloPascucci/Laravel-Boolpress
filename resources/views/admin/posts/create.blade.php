@extends('layouts.admin')

@section('content')

<h1>Create a new Product</h1>

@include('partials.errors')

    <form action="{{route('admin.posts.store')}}" method="post">
    @csrf

    <div class="mb-3">
        <label for="title "class="form-label">Titolo</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Lenovo Laptop" aria-describedby="titleHelper">
        <small id="titleHelper" class="text-muted" value="{{old('title')}}">Type a title for your product</small>
        @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

    <div class="mb-3">
        <label for="cover "class="form-label">Cover</label>
        <input type="text" name="cover" id="cover" class="form-control" placeholder="https://" aria-describedby="coverHelper">
        <small id="coverHelper" class="text-muted" value="{{old('cover')}}">Type a cover for your product</small>
        @error('cover')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

    <div class="mb-3">
        <label for="sub_title "class="form-label">Sottotitolo</label>
        <input type="number"  name="sub_title" id="sub_title" class="form-control" placeholder="333" aria-describedby="sub_titleHelper">
        <small id="sub_titleHelper" class="text-muted" value="{{old('sub_title')}}">Type a sub_title for your product</small>
        @error('sub_title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

    <div class="mb-3">
        <label for="body "class="form-label">Corpo</label>
        <textarea class="form-control" name="body" id="body" rows="5">{{old('body')}}</textarea>
        @error('body')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

    <button type="submit" class="btn btn-dark">Save</button>
    </form>

@endsection