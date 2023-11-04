@extends('layouts.app')
@section('title' ,'Our posts')
@section('content')
<section id="blog" class="blog" style="padding-top:95px">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2 class="text-center text-success font-weight-bold pb-3">{{__('Our all posts')}} </h2> 
      </div>
      <div class="row">
        @if ($allposts->count())
        @foreach ($allposts as $post )
        
        <div class="col-lg-6 entries col-md-6">
          <article class="entry mb-3">
            <a href="{{ route('posts.findOne',$post->id) }}">
            <div class="entry-img">
              <img 
              style="width: 100%;
              object-fit: cover;
              border-radius: 1%;"  src="{{ asset($post->image) }}" alt="" class="img-fluid welcome-post-image">
            </div>

            <h2 class="entry-title">
              <a href="{{ route('posts.findOne',$post->id) }}">{{ $post->title_uz }}</a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="{{ route('posts.findOne',$post->id) }}"><time datetime="2020-01-01">{{ $post->created_at->diffForHumans() }}</time></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="{{ route('posts.findOne',$post->id) }}">{{ $post->comments->count() }}{{ Str::plural('comment', $post->comments->count()) }}</a></li>
              </ul>
            </div>

            <div class="entry-content">
              <p>
                Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.
              </p>
              {{ substr(strip_tags($post->body_en), 0, 500) }}
              {{ strlen(strip_tags($post->body_en)) > 50 ? "..." : "" }} 
              <div class="read-more">
                <a href="{{ route('posts.findOne',$post->id) }}">Read More</a>
              </div>
            </div>
          </article><!-- End blog entry -->
        </a>
        </div><!-- End blog entries list -->
       
        @endforeach
        <div class="read-more text-end d-flex justify-content-end">
            {{-- {{ $allposts->links() }} --}}
       </div>
        <!-- End blog sidebar -->
        @else
        <h6 class="text-center font-weight-bold my-5 py-5 justify-content-center text-align-center">{{ __('There is no post yet, wait ') }}</h6><hr>     
        @endif

      </div>

    </div>
  </section><!-- End Blog Section -->
@endsection