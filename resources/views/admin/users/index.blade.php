@extends('admin.admin_layout.app')
@section('title' , 'users')
@section('content')

<h1 class="text-center">users</h1>
  <div class="text-center">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
  </div>
  <div class="container py-5">
      <div class="table-responsive-sm table-responsive-md table-responsive-lg">
        <div class="card-body pb-0">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Num</th>
                  <th scope="col">Image</th>
                  <th scope="col">name</th>
                  <th scope="col">Subscribed</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <th scope="col">{{ ($users->currentpage()-1)*$users->perpage() + ($loop->index+1 )}}</th>
                    <th scope="row"><a href="{{ route('admin.user.show',$user->id) }}"><img style="width: 81px;height: 70px; object-fit: cover;" src="{{ asset($user->image) }}" alt="user image"></a></th>
                    <td><a href="{{ route('admin.user.show',$user->id) }}" class="text-primary fw-bold">{{ $user->name }}</a></td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td class="fw-bold">
                      <div class="d-md-flex">
                        @can('super-admin')
                        <a  href="{{ route('admin.user.edit',$user->id) }}" class="btn btn-primary my-md-2 mx-sm-2 my-xs-2 "> <i class="bi bi-eye"></i></a>
                        @endcan
                        <form action="{{ route('admin.user.delete',['id'=>$user->id]) }}" method="POST">
                          @method('DELETE')
                          @csrf
                            <button type="submit" class="btn btn-danger my-md-2 mx-sm-2 my-xs-2"><i class="bi bi-trash"></i></button>
                         </form>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <nav aria-label="Page navigation example">
              {{ $users->links() }}
            </nav>
          </div>
      </div>
        
  </div>
@endsection
