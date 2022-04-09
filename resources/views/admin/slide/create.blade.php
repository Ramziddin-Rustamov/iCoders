@extends('admin.admin_layout.app')
@section('title','Create new slide')
@section('content')
  <div class="container">
      <div class="text-center text-danger">
        @if($errors->any())
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-item">{{ $error }}</li>
            @endforeach
        </ul>
       @endif
      </div>
      <div class="d-flex justify-content-center">
        <form action="{{ route('slide.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="form-group col-md-12">
                <label for="inputEmail4">IMAGE</label>
                <input type="file" class="form-control" name="image" id="inputEmail4">
              </div>
              <div class="form-group col-md-12">
                <label for="inputPassword4">TITLE_UZ</label>
                <input type="text" name="title_uz" class="form-control" id="inputPassword4">
              </div>
            </div>
            <div class="form-group">
              <label for="inputAddress">TITLE_EN</label>
              <input type="text" name="title_en" class="form-control" id="inputAddress">
            </div>
            <div class="form-group">
              <label for="inputAddress2">BODY_EN </label>
              <input type="text" name="body_en" class="form-control" id="inputAddress2">
            </div>
            <div class="form-group">
                <label for="inputAddress2">BODY_UZ </label>
                <input type="text" name="body_uz" class="form-control" id="inputAddress2">
              </div>
            <button type="submit" class="btn btn-primary my-2">Create</button>
          </form>
      </div>
  </div>
@endsection