@extends('admin.admin_layout.app')
@section('title', ' Contacted Users')
@section('content')
<div class="container">
  <div class="text-center">
  @if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
      @endif
      </div>
        <table class="table table-hover table-dark responsive">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Reason</th>
                <th scope="col">Sent at</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @if ($contacts->count())
              @foreach ($contacts as $contact)
              <tr>       
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $contact->user->name }}</td>
                    <td>{{ $contact->reason }}</td>
                    <td>{{ $contact->created_at->diffForHumans() }}</td>                
                <td>
                    <a class="btn btn-primary" title="Learn more" href="{{ route('admin.contact.show',['id'=>$contact->id]) }}"><i class="bi bi-eye"></i></a>
                    @can('super-admin')
                      <form method="POST" action="{{ route('admin.contact.delete',['id'=>$contact->id]) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger my-md-2 mx-sm-2 my-xs-2"><i class="bi bi-trash"></i></button>
                      </form>
                    @endcan
                  </td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
          {{ $contacts->links() }}
    </div>
@endsection