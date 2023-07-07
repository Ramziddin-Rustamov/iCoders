@extends('layouts.app')
@section('title' ,'Clients view')
@section('content')
   <!-- ======= Testimonials Section ======= -->
   <section id="testimonials" class="testimonials section-bg" style="padding-top:125px;">
    <div class="container">

      <form method="post" action="{{ route('client.store') }}" >
        @csrf
            <div class="text-start d-flex">
              @auth
              <div class=" py-2">
                <a href="{{ asset(Auth::user()->image) }}">
                <img  
                class="user-circle-image-class" 
                src="{{ asset(Auth::user()->image)  }}"
                 alt="image'">  
                </a>
              </div>
              <h5 class="text-bold  pt-3">{{ auth()->user()->name }}</h5>
              @endauth
          </div>
        <div class="row">
          <div class="col form-group">
            <textarea rows="3" name="clientView" 
               class="form-control w-100 @error('clientView') is-invalid  @enderror " placeholder="{{ __('Post , your personal view for us') }}" required></textarea>
               @auth
               <div class="text-end"> 
                <button type="submit" class="btn btn-primary my-2 ">
                  Commit
                </button>
              </div>   
               @endauth  
               @guest
               <div class="">
                <a href="{{ route('register') }}" class="btn btn-primary my-2">{{ __('Please Log in') }}</a> 
              </div>
               @endguest       
          </div>
        </div>
      </form>

      <div class="row">
        @if ($clientviews->count())
        @foreach ($clientviews as $item )
        <div class="col-lg-6">
          <div class="testimonial-item mt-4 mt-lg-4">
            <a href="{{ asset($item->user->image) }}">
              <img class=" rounded img-fluid  " src="{{ asset($item->user->image) }}" alt="{{ $item->user->name }}`image">
            </a>
            <a href="{{ route('client.show',['id'=>$item->user->id]) }}">{{ $item->user->name }}</a>
            <h4>{{ ($item->user->job) ?? 'No job yet' }}</h4>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
               {{ substr(strip_tags($item->clientView), 0, 500) }}
                {{ strlen(strip_tags($item->clientView)) > 140 ? "....." : "" }}
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>
        </div>
        @endforeach  
        <div class="d-flex justify-content-end pt-3">
          {{ $clientviews->links() }}
        </div> 
        @endif              
      </div>
      
    </div>
  </section><!-- End Testimonials Section -->
  @endsection
