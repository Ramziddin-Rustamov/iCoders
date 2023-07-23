@extends('layouts.app')
@section('title','Register now')

@section('content')
<div class="container pb-5"style="padding-top:125px">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- for register google account --}}
                        {{-- <div class="row mb-3">
                        <label for="google" class="col-md-4 col-form-label text-md-end">{{ __('Google') }}</label>

                        <div class="col-md-6">
                            <a id="google" class="form-control btn btn-danger" href="{{ route('login.google') }}">Register By Google <i class="fa fa-google"></i></a>

                            @error('google')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                        {{-- for register Facebbok account --}}
                        {{-- <div class="row mb-3">
                        <label for="Facebbok" class="col-md-4 col-form-label text-md-end">{{ __('Facebbok') }}</label>

                        <div class="col-md-6">
                            <a id="Facebbok" class="form-control btn btn-primary" href="{{ route('login.facebook') }}">Register By Facebook <i class="fa fa-facebook"></i></a>

                            @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                        {{-- for register facebook account --}}
                        {{-- <div class="row mb-3">
                        <label for="Git Hub" class="col-md-4 col-form-label text-md-end">{{ __('Git Hub') }}</label>

                        <div class="col-md-6">
                            <a id="Git Hub"  class="form-control btn btn-dark" href="{{ route('login.github') }}">Register By Git Hub <i class="fa fa-github fa-1g"></i></a>

                            @error('Git Hub')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                    {{-- <h5 class="text-center offset-md-2 font-weight-bold"><i class="fa fa-upper "></i> OR </h5> --}}


                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
