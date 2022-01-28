@extends('layouts.admin')

@section('content')

<div class="container mt-5">
    <h1>Tags</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('admin.tags.store')}}" method="post">
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Tag name here" aria-describedby="nameHelper">
              <small id="nameHelper" class="text-muted"> Type a tag name, max: 200</small>
                </div>
                <button type="submit" class="btn btn-dark">Add tag</button>
            </form>
        </div>
        <div class="col-md-6">
            <ul class="list-group">
                    @foreach ($tags as $tag)
                    <li class="list-group-item d-flex align-items-center ">
                        <form action="{{route('admin.tags.update', $tag->id)}}" method="post">
                        @csrf
                        @method('PATCH')

                        <input class="border-0" type="text" name="name" id="name" value="{{$tag->name}}">    
                    </form>
                    <span class="badge bg-rounded-pill bg-dark">{{$tag->posts()->count()}}</span>
                    <form action="{{route('admin.tags.destroy', $tag->id )}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn text-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                    </form>
                    </li>
                    @endforeach
                </ul>
        </div>
    </div>
</div>
    
@endsection