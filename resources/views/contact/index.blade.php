@extends('layouts.app')
@section('title', 'Contact Us')

@section('content')
    <!-- ======= Contact Section ======= -->
   
      <section id="contact" class="contact" style="padding-top:105px">
        <div class="container">
  
          <div class="row justify-content-center" data-aos="fade-up">
  
            <div class="col-lg-10">
  
              <div class="info-wrap">
                <div class="row">
                  <div class="col-lg-4 info">
                    <i class="bi bi-geo-alt"></i>
                    <h4>Location:</h4>
                    <p>Władysława Korotyńskieg<br>14, 02-121 Warszawa, Poland</p>
                  </div>
  
                  <div class="col-lg-4 info mt-4 mt-lg-0">
                    <i class="bi bi-envelope"></i>
                    <h4>Email:</h4>
                    <p>rustamovvramziddin@gmail.com<br>rustamovpoland@gmail.com</p>
                  </div>
  
                  <div class="col-lg-4 info mt-4 mt-lg-0">
                    <i class="bi bi-phone"></i>
                    <h4>Call:</h4>
                    <p>+48732786924 <br> +48574058101</p>
                  </div>
                </div>
              </div> 
            </div> 
          </div>
          <div class="row mt-5 justify-content-center" data-aos="fade-up">
            <div class="text-center col-lg-10 ">
              @if($errors->any())
                  @foreach ($errors->all() as $error )
                    <strong>{{ $error }}</strong>
                  @endforeach
              @endif
            </div>
            <div class="text-center col-lg-10 ">
              @if (session('success'))
                  <div class="alert alert-success mb-1 py-2">
                      {{ session('success') }}
                  </div>
              @endif
          </div> 
          </div>
          <div class="row mt-2 justify-content-center" data-aos="fade-up">
            <div class="col-lg-10">
              <form action="{{ route('contact.store') }}" method="post" role="form" class="php-email-form ">    
                <div class="form-group mt-3">
                  @csrf
                  <select name="reason" class="form-control @error('message') is-invaled @enderror" required>
                    <option class="text-danger" selected>Please Select</option>
                    <option class="text-success text-bold" value="course">About Course</option>
                    <option class="text-success font-weight-bold" value="others">For Some Reasons</option>
                    @foreach ($technologies as $item )            
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control @error('message') is-invaled @enderror"  name="message" rows="3" required placeholder="Enter What are you going to say" required></textarea>
                </div>
                 @auth
                 <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-end"><button type="submit">Send </button></div>
                 @endauth
                 @guest
                   <a href="{{ route('login') }}" class="btn btn-danger">Subscribe First</a>
                 @endguest
              </form>
            </div>
          </div>
        </div>
      </section><!-- End Contact Section -->
  
@endsection
