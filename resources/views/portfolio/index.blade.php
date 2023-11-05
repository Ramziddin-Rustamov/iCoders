@extends('layouts.app')

@section('title', 'Portfolio')
@section('content')
    
     <section id="portfolio" class="portfolio" style="padding-top:125px;">
      <div class="container">
        <div class="section-title">
          <h2 class="text-center text-success font-weight-bold pb-3">All Portfolio </h2> 
        </div>
        @if ($count)
          <div class="row" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
              
                <li data-filter=".filter-design">{{ __('Design') }}</li>
                <li data-filter=".filter-app">{{ __('Mobile Application') }}</li>
                <li data-filter=".filter-web">{{ __('Web Sites') }}</li>
              </ul>
            </div>
          </div>
          <div class="row portfolio-container" data-aos="fade-up">
           @foreach ($portfolio as $item )
          <div class="col-12 col-lg-4 col-md-6 portfolio-item filter-{{ $item->category }}">
            <img style="width: 100%;" class="shadow p-3 mb-5 bg-body rounded" src="{{ asset(json_decode($item->image)[0]) }}"   alt="Portfolio image">
            <div class="portfolio-info">
              <h4>{{ $item->category }}</h4>
              <p>{{  $item->client  }}</p>
              <a href="{{ asset(json_decode($item->image)[0]) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="image"><i class="bx bx-plus"></i></a>
              <a href="{{ route('portfolio.show',['id'=>$item->id]) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              @if (strpos($item->link, 'https://') === 0)
              <a target="_blank" href="{{$item->link}}" class="" title="More Details"><i class="bx bx-world"></i></a>
             @else
              <a target="_blank" href="https://{{$item->link}}" class="" title="See"><i class="bx bx-world"></i></a>
             @endif
            </div>
          </div>
          @endforeach
        </div>
         <div class="d-flex justify-content-end">
           {{ $portfolio->links() }}
         </div>
        @else
        <h6 class="text-center font-weight-bold py-5 my-5">{{ __('There is no Portfolio yet , wait ') }}</h6><hr>     
        @endif     
      </div>
    </section><!-- End Portfolio Section -->
  
@endsection