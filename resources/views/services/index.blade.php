@extends('layouts.app')
@section('title','Our Services')
@section('content')
<section id="services" class="services section-bg" style="padding-top:125px;">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2 class="text-center text-success font-weight-bold pb-3">All Technology </h2> 
          </div>
           <div class="row">
              @if ($technologies->count())
              @foreach ($technologies as $technology )
              <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box iconbox-teal">
                  <div class="icon">
                    <img class="img-fluid rounded" src="{{asset($technology->image) }}"/>
                  </div>
                  <h4><a href="">{{ $technology->name }}</a></h4>
                  <p>{{ $technology->body_uz }}</p>
                </div>
              </div>
              @endforeach
          @else
              <h6 class="text-center py-5 my-5">{{ __('There is no technology yet ,please wait ') }}</h6>
          @endif
      </div>
    </div>
  </section><!-- End Services Section -->

  <!-- ======= Features Section ======= -->
  <section id="features" class="features">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Features</h2>
        <p>With these exceptional features, we ensure a rewarding and enriching journey with us.</p>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-4">
          <div class="icon-box">
            <i class="ri-store-line" style="color: #ffbb2c;"></i>
            <h3><a href="">English for IT</a></h3>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
            <h3><a href=""> Finding Powerfull technical </a></h3>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
            <h3><a href="">Joining our team</a></h3>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 mt-4 mt-md-4">
          <div class="icon-box">
            <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
            <h3><a href="">Disscuss new technolies</a></h3>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-database-2-line" style="color: #47aeff;"></i>
            <h3><a href=""> Tlexible time</a></h3>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
            <h3><a href="">Ask question any time </a></h3>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Features Section -->

@endsection