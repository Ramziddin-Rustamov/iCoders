@extends('admin.admin_layout.app')
@section('title' , 'Create technology')
@section('content')
  <h1 class="text-center">Technology</h1>

    <div class="container py-5">

      <div class="row justify-content-center">
           <div class="text-center">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
           </div>
           
          <div class="col-md-8">
            <div class="text-start border-bottom mb-3">
              <a href="{{ route('admin.technology.index') }}" class="btn btn-danger mb-1">Back</a>
            </div>
            <form method="POST" action="{{ route('admin.technology.store') }}" class="row g-3 needs-validation" novalidate enctype="multipart/form-data">
              @csrf
              <div class="col-md-12">
                <label for="validationCustom01" class="form-label"> Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="validationCustom01" name="name" value="{{ old('name') }}" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
                @error('name')
                  <div class="text-start">
                      {{ $message }}
                  </div>
                @enderror
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="validationCustomUsername" class="form-label">Body_uz</label>
                  <textarea class="form-control @error('body_uz') is-invalid @enderror" id="validationTextarea" name="body_uz" rows="6" cols="4"  value="{{ old('body_uz') }}" placeholder="Body_uz" required></textarea>
                  @error('body_uz')
                  <div class="text-start">
                      {{ $message }}
                  </div>
                @enderror
              </div>
              </div>
              

              <div class="col-md-12">
                <div class="mb-3">
                  <label for="validationCustomUsername" class="form-label">Body_en</label>
                  <textarea class="form-control @error('body_en') is-invalid @enderror" id="validationTextarea" name="body_en" rows="6" cols="4" value="{{ old('body_en') }}" placeholder="Body_en" required></textarea>
                  <div class="invalid-feedback">
                    @error('body_en')
                  <div class="text-start">
                      {{ $message }}
                  </div>
                @enderror
                  </div>
              </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <input type="file" class="form-control" name="image" aria-label="file example" >
                  <div class="invalid-feedback @error('image') is-invalid @enderror">Image Required </div>
                </div>
                @error('image')
                <div class="text-start">
                    {{ $message }}
                </div>
              @enderror
              </div>
        
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                  <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                  </label>
                  <div class="invalid-feedback">
                    You must agree before submitting.
                  </div>
                </div>
              </div>
              <div class="col-12">
                <button class="btn btn-primary" type="submit"><i class="bi bi-plus"></i></button>
              </div>
            </form>
          </div>
      </div>
  </div>
@endsection