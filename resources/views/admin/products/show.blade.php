@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
              <img src="{{$product->image}}" class="card-img-top" alt="{{$product->name}}">
              <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <h6 class="card-text ">{{$product->price}}</h6>
                <p class="card-text">{{$product->description}}</p>
                <a name="shop" href="{{route('admin.products.index')}}" role="button">back to back</a>
              </div>
            </div>
        </div>
    </div>
@endsection