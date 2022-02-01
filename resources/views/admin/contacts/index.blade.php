@extends('layouts.admin')

@section('content')
    

<h1>All messages received</h1>

@if (session('message'))
<div class="alert alert-info" role="alert">
    <strong>{{session('message')}}</strong>
</div>
    
@endif
<table class="table table-responsive-md table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
        <tr>
            <td scope="row">{{$contact->id}}</td>
            <td>{{$contact->created_at}}</td>
            <td>{{$contact->name}}</td>
            <td>{{$contact->email}}</td>
            <td></td>
            <td><a href="{{route('admin.contacts.show', $contact->id)}}" >
                Read Message
            </a>

            <button type="button" class="btn text-danger" data-bs-toggle="modal" data-bs-target="#delete_message_{{$contact->id}}">
                   <i class="fas fa-trash"></i>
                   </button>
                   
                    <div class="modal fade" id="delete_message_{{$contact->id}}" role="dialog" tabindex="-1" aria-labelledby="removeMessage_{{$contact->id}}" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Delete Message {{$contact->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                          </div>
                          <div class="modal-body">
                            Stai per cancellare definitivamente il messagio, sei sicuro 😫?
                            Il messaggio non viene rimosso dal tuo account ma solo dal db dell'applicazione
                          </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                               Close
                             </button>
                             <form action="{{route('admin.contacts.destroy', $contact->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-white">Delete</button>
                            </form>

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