@extends('admin.admin_layout.app')
@section('title' , 'Technol..')
@section('content')

<h1 class="text-center">Technoligies</h1>
<div class="row justify-content-center">
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
            <div class="text-end py-2">
                <a href="{{ route('admin.technology.create') }}" class="btn btn-primary"> Add  </a>
            </div>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">T/r</th>
                  <th scope="col">Image</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($technology as $tech)
                  <tr>
                    <th scope="col">{{ ($technology->currentpage()-1)*$technology->perpage() + ($loop->index+1 )}}</th>
                    <th scope="row"><a href="{{ asset($tech->image) }}"><img style="width: 81px;height: 70px; object-fit: cover;" src="{{ asset($tech->image) }}" alt="Post image"></a></th>
                    <td><a href="{{ route('admin.technology.show',$tech->id) }}" class="text-primary fw-bold">{{ $tech->name }}</a></td>
                    <td>{{ substr(strip_tags($tech->body_en), 0, 20) }}
                     {{ strlen(strip_tags($tech->body_en)) > 20 ? "..." : "" }}</td>
                    <td class="fw-bold">
                      <div class="d-md-flex">
                        <a  href="{{ route('admin.technology.show',$tech->id) }}" class="btn btn-primary my-md-2 mx-sm-2 my-xs-2 "> <i class="bi bi-eye"></i></a>
                         <form action="{{ route('admin.technology.delete',['id'=>$tech->id]) }}" method="POST">
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
              {{ $technology->links() }}
            </nav>
          </div>
      </div>
        
  </div>
@endsection