@extends('admin.admin_layout.app')
@section('title' , 'Technology')
@section('content')
    <div class="container">
        <div class="text-center d-flex justify-content-center">
            <section id="services" class="services section-bg" style="padding-top:125px;">
                <div class="container" data-aos="fade-up">
                  <div class="section-title">
                    <h2 class="text-center text-success font-weight-bold pb-3">view </h2> 
                  </div>
                   <div class="row">
                      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box iconbox-teal">
                          <div class="icon">
                            <img  src="{{ asset($technology->image) }}"/>
                            <i class="bx bx-tachometer"></i>
                          </div>
                          <h4><a href="">{{ $technology->name }}</a></h4>
                          <p>{{ $technology->body_uz }}</p>
                        </div>
                      </div>              
              </div>
            </div>
          </section><!-- End Services Section -->
        
        </div>
    </div>
@endsection