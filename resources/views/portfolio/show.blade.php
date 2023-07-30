@extends('layouts.app')

@section('title', 'Portfolio')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs pt-4">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Portfolio</h2>
          
        </div>
      </div>
    </section><!-- End Breadcrumbs -->
     <!-- ======= Portfolio Details Section ======= -->
     <section id="portfolio-details" class="portfolio-details" >
        <div class="container"> 
          <div class="row">
          <!-- ======= Hero Section ======= -->
          <a href="a">
          <section id="hero">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade " data-bs-ride="carousel">
              <div class="carousel-inner" role="listbox">
                @foreach (json_decode($portfolio->image) as $image )
               
                <div class="carousel-item {{ ($loop->index == 0) ? 'active':'' }}" style="background-image: url('{{ asset($image) }}'); background-position:center;">
                  <div class="carousel-container d-flex justify-content-center">
                    <a href="{{ asset($image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link border-3 bg-primary pt-2 px-2 border border-primary rounded-circle " title="Portfolio image"><i class="bx bx-plus fa-3x h3 "></i></a>                  </div>
                </div>   
                @endforeach
              </div>
              <a class="carousel-control-prev " href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="bg-primary  border-primary carousel-control-prev-icon bi bi-chevron-left  " aria-hidden="true"></span>
              </a>
              <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="bg-primary  border-primary  carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
              </a>
              <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            </div>
          </section><!-- End Hero -->
          </a>
            <div class="col-md-12 pt-2">
             <div class="row">
              <div class="col-md-6 shadow p-3 mb-5 bg-body rounded">
                <div class="portfolio-info">
                  <h3 class="card-title">Project information</h3>
                  <ul class="list-group">
                    <li class="list-group-item list-group-item-secondary"><strong>Category</strong>: {{ $portfolio->category }}</li>
                    <li class="list-group-item list-group-item-secondary"><strong>Client</strong>: {{ $portfolio->client }}</li>
                    <li class="list-group-item list-group-item-secondary"><strong>Posted :</strong>: {{ $portfolio->created_at }}</li>
                    <li class="list-group-item list-group-item-secondary"><strong>Project URL</strong>: 
                      @if (strpos($portfolio->link, 'https://') === 0)
                      <a target="_blank" href="{{ $portfolio->link }}">{{ $portfolio->link }}</a>
                     @else
                     <a target="_blank" href="https://{{ $portfolio->link }}">{{ $portfolio->link }}</a>
                     @endif
                    
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6 shadow p-3 mb-5 bg-body rounded">
                <div class="portfolio-description">
                  <h2>Portfolio detail</h2>
                  <p>
                      {{ $portfolio->detail_en }}
                  </p>
                </div>
              </div>
             </div>
            </div>
          </div>
        </div>
      </section><!-- End Portfolio Details Section -->
@endsection