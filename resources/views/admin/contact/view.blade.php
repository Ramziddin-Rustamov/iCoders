@extends('admin.admin_layout.app')
@section('title', ' Contacted Users')
@section('content')
 <div class="container py-5">
     <div class="row">
         <div class="col-12 col-md-6">
            <h3 class="text-start">User</h3><hr>
            <a href="{{ asset($contacts->user->image )}}">
                <img style="width:325px;"src="{{ asset($contacts->user->image) }}" alt="Contacted user image">
            </a><hr>
            <h3 class="text-start">User name</h3>
            <p class="text-start">{{ $contacts->user->name }}</p>
         </div>
         <div class="col-12 col-md-6">
            <h3 class="text-start">Message</h3><hr>
            <p>{{ $contacts->message }}</p><hr>
            <h3 class="text-start">Reason</h3><hr>
            <span class="text-start">
               {{ $contacts->reason }}
            </span> <hr>
            <h3 class="text-start">Sent at </h3><hr>
            <span class="text-start">
                 {{ $contacts->created_at }}
              </span> <hr>
            <h4 class="text-start">Passed time untill now </h4><hr>
              <span class="text-start ">
                {{ $contacts->created_at->diffForHumans() }}
             </span>
         </div>
     </div>
     <a href="{{ route('admin.contact.index') }}" class="btn btn-danger mt-3">Back</a>
    </div>
@endsection