@extends('layouts.admin')

@section('content')
<h1>Posts</h1>
<a href="{{route('admin.posts.create')}}" role="button" class="btn btn-dark">Create Post</a>
<table class="table">
<thead>
  <tr>
    <th>ID</th>
    <th>Cover</th>
    <th>Title</th>
    <th>Sub Title</th>
    <th>Actions</th>
  </tr>
</thead>
<tbody>
  @foreach ($posts as $post)
  <tr>
    <td scope="row">{{$post->slug}}</td>
    <td><img width="100" src="{{$post->cover}}" alt="{{$post->title}}"></td>
    <td>{{$post->title}}</td>
    <td>{{$post->sub_title}}</td>
    <td>
      <a href="{{route('admin.posts.show', $post->slug)}}" role="button"><i class="fas fa-eye fa-lg fa-fw" aria-hidden="true"></i></a>
      <a href="{{route('admin.posts.edit', $post->slug)}}" role="button"><i class="fas fa-pencil-alt fa-lg fa-fw" aria-hidden="true"></i></a>
<button type="button" class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#delete_post_{{$post->slug}}">
 <a href="{{route('admin.posts.destroy', $post->slug)}}" role="button">
<i class="fas fa-trash"></i>
</a>
  
</button>

 <div class="modal fade" id="delete_post_{{$post->slug}}" data-backdrop="static" role="dialog" tabindex="-1" aria-labelledby="modal_{{$post->slug}}" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Delete Post {{$post->title}}</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
         </button>
       </div>
       <div class="modal-body">
         Stai per cancellare definitivamente il post, sei sicuro?
       </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <form action="{{route('admin.posts.destroy', $post->slug)}}" method="post"></form>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger text-white">Delete</button>
        </div>
     </div>
   </div>
 </div>
    </td>
  </tr>
  
  @endforeach
</tbody>
</table>
@endsection