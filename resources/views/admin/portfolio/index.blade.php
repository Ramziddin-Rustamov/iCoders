@extends('admin.admin_layout.app')
@section('title' , 'All portfolio')
@section('content')
<div class="container py-5">
    <div class="table-responsive-sm table-responsive-md table-responsive-lg">
      <div class="card-body pb-0">
        <div class="row justify-content-center">
          <div class="text-center">
               @if (session('success'))
                   <div class="alert alert-success">
                       {{ session('success') }}
                   </div>
               @endif
          </div>
          @if (count($errors) > 0)
         <div class="alert alert-danger">
             <strong>Whoops!</strong> There were some problems with your input.<br><br>
             <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
             </ul>
         </div>
         @endif
          <div class="text-end py-2">
              <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i> </a>
          </div>
          <table class="table table-bordered table-responsive">
            <thead>
              <tr>
                <th scope="col">T/r</th>
                <th scope="col">Image</th>
                <th scope="col">Client</th>
                <th scope="col">Link</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($portfolioes as $port)
                <tr>
                  <th scope="col">{{ $loop->index+1 }}</th>
                  <th scope="row"><a href="{{ asset(json_decode($port->image)[0]) }}"><img style="width: 81px;height: 70px; object-fit: cover;" src="{{ asset(json_decode($port->image)[0]) }}" alt="Post image"></a></th>
                  <td> {{ $port->client }}</td>
                  <td>{{ $port->link }}</td>
                  <td>{{ $port->category }}</td>
                  <td class="fw-bold">
                    <div class="d-md-flex">
                      <a  href="{{ route('admin.portfolio.edit',['portfolio'=>$port->id]) }}" class="btn btn-primary my-md-2 mx-sm-2 my-xs-2 "> <i class="bi bi-pencil-square"></i></a>
                      <form method="POST" action="{{ route('admin.portfolio.delete',['portfolio'=>$port->id]) }}">
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
            {{ $portfolioes->links() }}
          </nav>
        </div>
    </div>
      
</div>
@endsection