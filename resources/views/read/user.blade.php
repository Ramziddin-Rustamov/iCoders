@extends('layouts.app')
@section('title', 'User Commented')
@section('content')
<section class="h-100 gradient-custom-2" style="padding-top:125px;">
    <div class="container pb-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-12 col-xl-12">
         <div class="justify-content-between d-flex">
             <a href="{{url()->previous()}}" class="btn btn-danger"><i class="bi bi-arrow-return-left"></i></a>
             <h6 class="text-success">{{ __('Commeted User') }}</h6><hr>
         </div>
          <div class="card">
            <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
              <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                <img class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1" src="{{ asset($user->image)  }}" alt="{{ $user->name }}`image">           
                {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1"> --}}
                <button desabled type="button" class="btn btn-dark" data-mdb-ripple-color="dark" style="z-index: 1;">
                  {{ ($user->job)?? 'User JOB'  }}
                </button>
              </div>
              <div class="ms-3" style="margin-top: 130px;">
                <h5>{{ $user->name }}</h5>
                <p>{{ $user->location }}</p>
              </div>
            </div>
            <div class="p-4 text-black col-xs-12" style="background-color: #f8f9fa;">
              <div class="d-flex justify-content-end text-center py-1">
                @if ($user->instagram)
                <div class="ps-3">
                  <a href="{{ $user->instagram }}"><i class="bi bi-instagram"></i></a>
                  <p class="small text-muted mb-0">Instagram</p>
                </div>
                @endif
                @if($user->telegram)
                <div class="ps-3">
                  <a href="{{ $user->telegram }}"><i class="bi bi-telegram"></i></a>
                  <p class="small text-muted mb-0">Telegram</p>
                </div>
                @endif
                @if ($user->facebook)
                <div class="ps-3">
                  <a href="{{ $user->facebook }}"><i class="bi bi-facebook"></i></a>
                  <p class="small text-muted mb-0">Facebook</p>
                </div>
                @else
                <div class="ps-3">
                  <a href="{{ $user->linkedin }}"><i class="bi bi-linkedin"></i></a>
                  <p class="small text-muted mb-0">Linkedin</p>
                </div>
                @endif      
              </div>
            </div>
             @if ($user->about_uz)
              <div class="card-body p-4 text-black">
                <div class="mb-5">
                  <p class="lead fw-normal mb-1">{{ __('About User') }}</p>
                  <div class="p-4" style="background-color: #f8f9fa;">
                    <p class="font-italic mb-1">{{ $user->about_uz }}</p>
                  </div>
                </div>  
              </div>
             @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection