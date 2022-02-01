@extends('layouts.app')

@section('content')
<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">Contact us</h1>
        <p class="lead">We will help you if u need</p>
    </div>
</div>

@include('partials.errors')

@if(session('message'))
<div class="alert alert-success" role="alert">
    <strong>{{session('message')}}</strong>
</div>
@endif
<div class="container">
<form action="{{route('contacts.send')}}" method="post">
    @csrf
    <div class="mb-3">

        <div class="row">
            <div class="col">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Mario Rossi" aria-describedby="nameHelper" required minlength="4" maxlength="50" value="{{old('name')}}">
                    <small id="nameHelper" class="text-muted">Type your name here, max: 50 characters</small>
            </div>
            <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Mario@Rossi.com" aria-describedby="emailHelper" required value="{{old('email')}}">
                    <small id="emailHelper" class="text-muted">Type your email here</small>
            </div>
        </div>
    </div>
        <div class="mb-3">
          <label for="note" class="form-label">Note</label>
          <textarea class="form-control" name="note" id="note" rows="5">{{old('note')}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100 text-white">Send</button>
</form>    
</div>

@endsection


