@extends('layouts.admin')

@section('content')

<h1>{{$contact->name}}</h1>
<div class="metadata">
    <span>From: {{$contact->email}}</span> | <span> Date:{{$contact->created_at}}</span>
</div>
<p>
    {{$contact->note}}
</p>
<hr>
<h2>Reply</h2>
<form action="" method="post">
    @csrf
<div class="mb-3">
  <label for="" class="form-label">Message</label>
  <textarea class="form-control" name="" id="" rows="3"></textarea>
</div>  
<button type="submit" class="btn btn-primary">Reply</button>
</form>

@endsection