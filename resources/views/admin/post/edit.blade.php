@extends('admin.admin_layout.app')
@section('title', 'Edit Post')
@section('content')
<h1 class="text-center">Edit post</h1>

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
          <a href="{{ route('posts.index') }}" class="btn btn-danger mb-1">Back </a>
        </div>
        <form method="post" action="{{ route('posts.update',$post->id) }}" class="row g-3 needs-validation" novalidate>
          @csrf
          @method('PUT')
          <div class="col-md-6">
            <label for="validationCustom01" class="form-label"> Title_uz</label>
            <input type="text" class="form-control @error('title_uz') is-invalid @enderror" id="validationCustom01" name="title_uz" value="{{ old('title_uz') ?? $post->title_uz }}" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
            @error('title_uz')
              <div class="text-start">
                  {{ $message }}
              </div>
            @enderror

          <div class="col-md-6">
            <label for="validationCustom02" class="form-label">Title_en</label>
            <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="validationCustom02"name="title_en" value="{{ old('title_en') ?? $post->title_en}}" required>
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label for="validationCustomUsername" class="form-label">Body_uz</label>
              <textarea class="form-control @error('body_uz') is-invalid @enderror" id="validationTextarea" name="body_uz" rows="6" cols="4"  placeholder="Body_uz" required> value="{{ old('body_uz') ?? $post->body_uz }}"</textarea>
              <div class="invalid-feedback">
                Please enter a message in the textarea.
              </div>
          </div>
          </div>

          <div class="col-md-6">
            <div class="mb-3">
              <label for="validationCustomUsername" class="form-label">Body_en</label>
              <textarea class="form-control @error('body_en') is-invalid @enderror" id="validationTextarea" name="body_en" rows="6" cols="4"  placeholder="Body_en" required>value="{{ old('body_en') ?? $post->body_en }}"</textarea>
              <div class="invalid-feedback">
                Please enter a message in the textarea.
              </div>
          </div>
          </div>
          <div class="col-md-12">
            <div class="mb-3">
              <input type="file" class="form-control" name="image" aria-label="file example" value="{{ old('image') ?? $post->image }}">
              <div class="invalid-feedback @error('image') is-invalid @enderror">Image Required </div>
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