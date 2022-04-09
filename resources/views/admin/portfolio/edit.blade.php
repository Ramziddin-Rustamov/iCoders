@extends('admin.admin_layout.app')
@section('title' , 'Edit Portfolio')
@section('content')
    <h1 class="text-center">Portfolio Edit</h1>

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
              <form method="post" action="{{ route('admin.portfolio.update',['portfolio'=>$port->id]) }}" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate >
                @csrf
                @method('PUT')
                <div class="col-md-12">
                  <label for="validationCustom02" class="form-label">Category</label>
                  <select name="category"  class="form-control @error('category') is-invalid @enderror" id="validationCustom02" required>
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
                    <input type="text" class="form-control @error('client') is-invalid @enderror" id="validationCustom02"name="client" value="{{ old('client') ?? $port->client}}" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Link </label>
                    <input type="text" class="form-control @error('link') is-invalid @enderror" id="validationCustom02"name="link" value="{{ old('link') ?? $port->link}}" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                  </div>

                <div class="col-md-12">
                  <div class="mb-3">
                    <label for="validationCustomUsername" class="form-label">Detail_uz</label>
                    <textarea class="form-control @error('detail_uz') is-invalid @enderror" id="validationTextarea" name="detail_uz" rows="6" cols="4" placeholder="detail_uz" required>{{  old('detail_uz') ?? $port->detail_uz }}</textarea>
                    <div class="invalid-feedback">
                      Please enter a message in the textarea.
                    </div>
                </div>
                </div>
  
                <div class="col-md-12">
                  <div class="mb-3">
                    <label for="validationCustomUsername" class="form-label">Detail_en</label>
                    <textarea class="form-control @error('detail_uz') is-invalid @enderror" id="validationTextarea" name="detail_en" rows="6" cols="4"  placeholder="detail_en" required>{{ old('detail_en') ?? $port->detail_en }}</textarea>
                    <div class="invalid-feedback">
                      Please enter a message in the textarea.
                    </div>
                </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                    <label for="validationCustomUsername" class="form-label">UPloaded Images</label>
                      @foreach (json_decode($port->image) as $image )
                       <div class="col">
                        <div class="mb-3">
                            <img style="width: 118px; object-fit: cover;border-radius: 7px;
                            box-shadow: 0px -3px 15px 1px;" src="{{  asset($image) }}" alt="">
                         </div>
                       </div>
                     @endforeach 
                     </div>
                 </div>    
                <div class="col-md-12">
                  <div class="mb-3">
                    <input type="file" class="form-control" name="image[]"   aria-label="file example"   id="formFileMultiple" multiple>
                  </div>
                </div>            
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Edit</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection