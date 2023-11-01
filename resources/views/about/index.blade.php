@extends('layouts.app')
@section('title','About us')
@section('content')


  <!-- ======= Our Team Section ======= -->
  <section style="padding-top:100px;"id="team" class="team section-bg">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>{{ __('Our Team') }}</h2>
          <p>"Our Team - A united force driving excellence together, embracing diversity and fostering a positive work culture to achieve remarkable results

            . Our dedicated and passionate team collaborates with mutual respect, valuing each other's unique skills and experiences
            
            . Together, we strive to make a positive impact, overcoming challenges and celebrating success as one cohesive unit."</p>  
    </div>
        <div class="row justify-content-around">
          @if ($team->count())
          @foreach ($team as $user )
          <div class="col-lg-3 col-md-6  d-flex align-items-stretch">
            <div class="member" >
              <div class="member-img">
                <img src="{{ $user->image }}"   class="img-fluid" alt="{{ $user->name }}`image">
                <div class="social">
                  <a href="{{ $user->telegram }}"><i class="bi bi-telegram"></i></a>
                  <a href="{{ $user->facebook }}"><i class="bi bi-facebook"></i></a>
                  <a href="{{ $user->instagram }}"><i class="bi bi-instagram"></i></a>
                  <a href="{{ $user->linkedin }}"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>{{ $user->name }}</h4>
                <span>{{ $user->job }}</span>
              </div>
            </div>
          </div>
          @endforeach
          @else
            <h6  class="text-center">{{ __('There is no User yet') }}</h6><hr>
          @endif
        </div>
    </div>
  </section><!-- End Our Team Section -->

  <!-- ======= Our Skills Section ======= -->
  <section id="skills" class="skills">
    <div class="container">

      <div class="section-title" data-aos="fade-up">
        <h2>{{ __('Our Skills') }}</h2>
        <p>With proficiency in these technologies, we are well-equipped to take on diverse challenges and deliver exceptional solutions for our clients."</p>
      </div>

      <div class="row skills-content">

        <div class="col-lg-6" data-aos="fade-up">

          <div class="progress">
            <span class="skill">HTML <i class="val">90%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          

          <div class="progress">
            <span class="skill">CSS <i class="val">90%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">JavaScript <i class="val">65%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">Flutter <i class="val">70%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">Python <i class="val">65%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

          <div class="progress">
            <span class="skill">PHP <i class="val">75%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">Larvel  <i class="val">70%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">Vue.js  <i class="val">65%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">React <i class="val">70%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">Design <i class="val">65%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </section><!-- End Our Skills Section -->

  <!-- ======= Our Clients Section ======= -->
  <section id="clients" class="clients">
    <div class="container">

      <div class="section-title">
        <h2 class="text-success font-weight-bold ">Clients</h2>
      </div>

      <div class="row text-center justify-content-center">
        {{-- <div class="col-lg-3 col-md-6 col-6">         
            <img src="assets/img/clients/clientIT.jpg" class="img-fluid" alt="">
        </div> --}}
        <div class="col-lg-3 col-md-6 col-12">
            <img src="assets/img/clients/world1.jfif" class="img-fluid" alt="">
        </div>

        <div class="col-lg-3 col-md-6 col-12">
          <img src="assets/img/clients/texno.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-3 col-md-6 col-12">
          <img src="assets/img/clients/autoMed.png" class="img-fluid" alt="">
        </div>
          <div class="col-lg-3 col-md-6 col-12">
            <img src="assets/img/clients/minded.jfif" class="img-fluid" alt="">
        </div>
      </div>

    </div>
  </section><!-- End Our Clients Section -->
@endsection