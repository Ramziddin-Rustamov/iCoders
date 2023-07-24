@extends('layouts.app')
@section('title','Home page')
@section('content')
  <!-- ======= Header ======= -->
 

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">
        @foreach ($slides as $slide )
        <div class="carousel-item {{ ($loop->index == 0) ? 'active':'' }}" style="background-image: url('{{ $slide->image }}');">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>{{ $slide->title_en }}</h2>
              <p>{{ $slide->body_en }}</p>
              @guest               
              <div class="text-center"><a href="{{ route('register') }}" class="btn-get-started">{{ __('Follow Us') }}</a></div>
              @endguest
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->
  <section id="blog" class="blog">
    <div class="container">
      <div class="section-title">
        <h2 class="text-center text-success font-weight-bold pb-3">{{__('New Posts')}} </h2> 
      </div>
      <div class="row">
        @if ($postCount)
        @foreach ($posts as $post)
        <div class="col-lg-6 entries col-md-6">
          <article class="entry mb-3">

            <div class="entry-img">
              <img 
              style="width: 100%;
              object-fit: cover;
              border-radius: 1%;"  src="{{ $post->image }}" alt="" class="img-fluid welcome-post-image">
            </div>

            <h2 class="entry-title">
              <a href="{{ route('posts.findOne',$post->id) }}">
                {{ substr(strip_tags($post->title_uz), 0, 500) }}
                {{ strlen(strip_tags($post->title_en)) > 55 ? "..." : "" }}
              </a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="{{ route('posts.findOne',$post->id) }}"><time datetime="2020-01-01">{{ $post->created_at->diffForHumans() }}</time></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="{{ route('posts.findOne',$post->id) }}">{{ $post->comments->count() }}{{ Str::plural('comment', $post->comments->count()) }}</a></li>
              </ul>
            </div>

            <div class="entry-content">
              <p >
                {{ substr(strip_tags($post->body_en), 0, 500) }}
                {{ strlen(strip_tags($post->body_en)) > 150 ? "............" : "" }}
              </p>
              <div class="read-more">
                <a href="{{ route('posts.findOne',$post->id) }}">Read More</a>
              </div>
            </div>
          </article><!-- End blog entry -->
        </div><!-- End blog entries list -->
        @endforeach
        <div class=" justify-content-end text-align-end d-flex pt-2">
          <a href="{{ route('posts.allposts') }}" class="btn btn-primary text-center font-weight-bold"> View more</a>
        </div>
        <!-- End blog sidebar -->
        @else
        <h6 class="text-center font-weight-bold">{{ __('There is no post yet, wait ') }}</h6><hr>     
        @endif

      </div>

    </div>
  </section><!-- End Blog Section -->


  <main id="main">
  <!-- ======= Our Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container">

      <div class="section-title">
        <h2 class="font-weight-bold text-success">Our <strong>Team</strong></h2>
        <p>"Our team is a cohesive and passionate force, driving excellence 
          through collaboration, diversity, and a shared commitment to making a positive impact."</p>
      </div>

      <div class="row">
        @if ($teamCount)
        @foreach ($team as $user )
        <div class="col-lg-3 col-md-6  d-flex align-items-stretch">
          <div class="member" >
            <div class="member-img">
              <img src="{{ $user->image }}" style="background-position: center;
              background-repeat: no-repeat;
              background-size: cover;
              position: relative;"   class="img-fluid" alt="{{ $user->name }}`image">
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

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" >
        <div class="section-title">
          <h2 class="text-center text-success font-weight-bold py-3 ">Technologies</h2>
        </div>
        <div class="row">
        
        @if ($techCount)
            @foreach ($technologies as $technology )
            <div class=" col-12 col-lg-4 col-md-4 d-flex align-items-stretch mt-4" >
              <div class="icon-box iconbox-teal">
                <div class="icon">
                  <img class="img-fluid rounded" src="{{ asset($technology->image) }}"/>
                </div>
                <h4><a href="{{ route('contact') }}">{{ $technology->name }}</a></h4>
                <p>{{ $technology->body_en }}</p>
              </div>
            </div>
            @endforeach
            <div class=" justify-content-end text-align-end d-flex pt-3">
              <a href="{{ route('services') }}" class="btn btn-primary text-center font-weight-bold"> View more</a>
            </div>
        @else
            <h6 class="text-center">{{ __('There is no technology yet') }}</h6>
        @endif

      </div>
      </div>
    </section>
    
    <!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
        <div class="section-title">
          <h2 class="text-center text-success font-weight-bold pb-3">Portfolio </h2> 
        </div>
        @if ($portfolioCount)
          <div class="row" >
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
              
                <li data-filter=".filter-design">{{ __('Design') }}</li>
                <li data-filter=".filter-app">{{ __('Mobile Application') }}</li>
                <li data-filter=".filter-web">{{ __('Web Sites') }}</li>
              </ul>
            </div>
          </div>
          <div class="row portfolio-container" >
           @foreach ($portfolio as $item )
          <div class="col-12 col-lg-4 col-md-6 portfolio-item filter-{{ $item->category }}">
            <img style="width: 100%;" src="{{ asset(json_decode($item->image)[0]) }}"   alt="Portfolio image">
            <div class="portfolio-info">
              <h4>{{ $item->category }} {{ $item->id}}</h4>
              <p>{{  $item->category  }}</p>
              <a href="{{ asset(json_decode($item->image)[0]) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Portfolio image"><i class="bx bx-plus"></i></a>
              <a href="{{ route('portfolio.show',['id'=>$item->id]) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
          @endforeach
        </div>
        @else
        <h6 class="text-center font-weight-bold">{{ __('There is no Portfolio yet , wait ') }}</h6><hr>     
        @endif     
      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">

        <div class="section-title">
          <h2 class="text-success font-weight-bold ">Clients</h2>
        </div>

        <div class="row" >
          <div class="col-lg-3 col-md-6 col-6">         
              <img src="assets/img/clients/clientIT.jpg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-3 col-md-6 col-6">
            <img src="assets/img/clients/texno.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-3 col-md-6 col-6">
            <img src="assets/img/clients/autoMed.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-3 col-md-6 col-6">
              <img src="assets/img/clients/world1.jfif" class="img-fluid" alt="">
          </div>
        </div>

      </div>
    </section><!-- End Our Clients Section -->

  </main><!-- End #main -->


@endsection