@extends('admin.admin_layout.app')
@section('title' , 'Create Portfolio')
@section('content')
    <h1 class="text-center">Portfolio create</h1>

    <div class="container py-5">

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
            <div class="col-md-8">
              <div class="text-start border-bottom mb-3">
                <a href="{{ route('admin.portfolio.index')}}" class="btn btn-danger mb-1">Back</a>
              </div>
              <form method="post" action="{{ route('admin.portfolio.store') }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate >
                @csrf
                <div class="col-md-12">
                  <label for="validationCustom02" class="form-label">Category</label>
                  <select name="category" class="form-control @error('category') is-invalid @enderror" id="validationCustom02" required>
                    <option selected>Select</option>
                    <option value="app">App</option>
                    <option value="design">Design </option>
                    <option value="web">Web site</option>
                  </select>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Client</label>
                    <input type="text" class="form-control @error('client') is-invalid @enderror" id="validationCustom02"name="client" value="{{ old('client') }}" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Link </label>
                    <input type="text" class="form-control @error('link') is-invalid @enderror" id="validationCustom02"name="link" value="{{ old('link') }}" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>

                <div class="col-md-12">
                  <div class="mb-3">
                    <label for="validationCustomUsername" class="form-label">Detail_uz</label>
                    <textarea class="form-control @error('detail_uz') is-invalid @enderror" id="validationTextarea" name="detail_uz" rows="6" cols="4"  value="{{ old('detail_uz') }}" placeholder="detail_uz" required></textarea>
                    <div class="invalid-feedback">
                      Please enter a message in the textarea.
                    </div>
                </div>
                </div>
  
                <div class="col-md-12">
                  <div class="mb-3">
                    <label for="validationCustomUsername" class="form-label">Detail_en</label>
                    <textarea class="form-control @error('detail_uz') is-invalid @enderror" id="validationTextarea" name="detail_en" rows="6" cols="4" value="{{ old('detail_en') }}" placeholder="detail_en" required></textarea>
                    <div class="invalid-feedback">
                      Please enter a message in the textarea.
                    </div>
                </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3">
                    <input type="file" class="form-control" name="image[]" aria-label="file example" required  id="formFileMultiple" multiple>
                    <div class="invalid-feedback @error('image') is-invalid @enderror">Image Required </div>
                  </div>
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
                  <button class="btn btn-primary" type="submit">Create new Portfolio</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection