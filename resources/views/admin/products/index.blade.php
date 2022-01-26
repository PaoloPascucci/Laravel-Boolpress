@extends('layouts.admin')

@section('content')
<h1>Products</h1>
<a href="{{route('admin.products.create')}}" role="button" class="btn btn-dark">Create Product</a>
<table class="table">
<thead>
  <tr>
    <th>ID</th>
    <th>Image</th>
    <th>Name</th>
    <th>Price</th>
    <th>Actions</th>
  </tr>
</thead>
<tbody>
  @foreach ($products as $product)
  <tr>
    <td scope="row">{{$product->id}}</td>
    <td><img width="100" src="{{$product->image}}" alt="{{$product->name}}"></td>
    <td>{{$product->name}}</td>
    <td>{{$product->price}}</td>
    <td>
      <a href="{{route('products.show', $product->id)}}" role="button"><i class="fas fa-eye fa-lg fa-fw" aria-hidden="true"></i></a>
      <a role="button"><i class="fas fa-pencil-alt fa-lg fa-fw" aria-hidden="true"></i></a>
      <a role="button"><i class="fas fa-trash fa-lg fa-fw" aria-hidden="true"></i></a>
    </td>
  </tr>
  
  @endforeach
</tbody>
</table>
@endsection