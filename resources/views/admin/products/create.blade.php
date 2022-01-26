@extends('layouts.admin')

@section('content')

<h1>Create a new Product</h1>

@include('partials.errors')

    <form action="{{route('admin.products.store')}}" method="post">
    @csrf

    <div class="mb-3">
        <label for="name "class="form-label">Nome</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Lenovo Laptop" aria-describedby="NameHelper">
        <small id="nameHelper" class="text-muted" value="{{old('name')}}">Type a name for your product</small>
        @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

    <div class="mb-3">
        <label for="image "class="form-label">Immagine</label>
        <input type="text" name="image" id="image" class="form-control" placeholder="https://" aria-describedby="imageHelper">
        <small id="imageHelper" class="text-muted" value="{{old('image')}}>Type a image for your product</small>
        @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

    <div class="mb-3">
        <label for="price "class="form-label">Prezzo</label>
        <input type="number" step="0.01" name="price" id="price" class="form-control" placeholder="333" aria-describedby="priceHelper">
        <small id="priceHelper" class="text-muted" value="{{old('price')}}>Type a price for your product</small>
        @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

    <div class="mb-3">
        <label for="qty "class="form-label">Qty</label>
        <input type="text" name="qty" id="qty" class="form-control" placeholder="Lenovo Laptop" aria-describedby="qtyHelper">
        <small id="qtyHelper" class="text-muted" value="{{old('qty')}}>Type a quantity for your product</small>
        @error('qty')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

    <div class="mb-3">
        <label for="description "class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description" rows="5">{{old('name')}}</textarea>
        @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

    <button type="submit" class="btn btn-dark">Save</button>
    </form>

@endsection