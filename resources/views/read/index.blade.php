@extends('layouts.app')
@section('title', 'Read more')
@section('content')
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog" style="padding-top:125px;">
        <div class="container" data-aos="fade-up">
  
          <div class="row">
  
            <div class="col-lg-12 entries">
  
              <article class="entry entry-single">
                  
                <div class="entry-img">
                  <a href="{{ asset($post->image) }}">
                    <img style="width: 100%;
                     object-fit: cover;
                     border-radius: 1%;" src="{{ asset($post->image) }}" alt="Post's image" class="img-fluid">
                  </a>
                </div>
  
                <h2 class="entry-title">
                  {{ $post->title_uz }}
                </h2>
  
                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i>{{ $post->user->name ?? 'NO user' }}</li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time >{{ $post->created_at->diffForHumans() }}</time></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> {{ $post->comments->count() }}</li>
                  </ul>
                </div>
  
                <div class="entry-content">
                  <p>
                    {{ $post->body_uz }}
                  </p>  
                </div>
                @auth
                  
                <div class="entry-footer d-flex">
                  <i class="bi bi-like"></i>
                  {{-- for like --}}
                  @if (!$post->likedBy(auth()->user()))
                    
                  <form action="{{ route('posts.like', $post->id) }}" method="post">
                    @csrf
                   <button class="btn btn-outline-success" type="submit">
                     <i class="bi bi-heart text-success ms-1"></i></button>
                  </form>
                  @else
                  {{-- for dislike --}}
                  <form action="{{ route('posts.like', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button  class="btn btn-outline-danger ms-1" type="submit">Unlike <i class="bi bi-heart-fill ms-1"></i></button><span class="text-green ps-2 font-weight-bold">{{ $post->likes->count() }}{{ Str::plural('like', $post->likes->count()) }}</span>
                  </form>
                  @endif 
                </div>
                @endauth
  
              </article><!-- End blog entry -->
  
              <div class="blog-author d-flex align-items-center">
                <img style="width: 100px;
                height: 50%;
                border-radius: 10px;"  src="{{ asset($post->user->image) }}" alt="{{ $post->user->name }}`image">
                <div>
                  <h4>Posted By  <span class="text-success"> {{ $post->user->name }} </span></h4>
                  <div class="social-links">
                    <a href="{{ $post->user->telegram }}"><i class="bi bi-telegram"></i></a>
                    <a href="{{ $post->user->facebook }}"><i class="bi bi-facebook"></i></a>
                    <a href="{{ $post->user->instagram }}"><i class="biu bi-instagram"></i></a>
                  </div>
                  <p>
                    {{ $post->user->about_uz }}
                  </p>
                </div>
              </div><!-- End blog author bio -->

              {{-- starts comment form --}}
              <div class="reply-form">
                <h4>{{ __('Leave a comment') }}</h4>
                <form method="POST" action="/posts/{{ $post->id }}/comments">
                  @csrf
                   @auth
                      <div class="text-start d-flex">
                        <div class=" py-2">
                          <a href="{{ asset(Auth::user()->image) }}">
                          <img class="user-circle-image-class" src="{{ asset(Auth::user()->image)  }}" alt="image">
                         </a>
                        </div>
                      <h5 class="text-bold  pt-3">{{ auth()->user()->name }}</h5>
                    </div>
                   @endauth
                  <div class="row">
                    <div class="col form-group">
                      <textarea rows="7" name="body" class="form-control" placeholder="{{ __('Post a comment') }}"></textarea>
                       @auth
                       <div class="text-end"> 
                         <button type="submit" class="btn btn-primary my-2 ">
                           Post comment
                         </button>
                       </div>
                      @endauth           
                      @guest 
                      <div class="">
                        <a href="{{ route('register') }}" class="btn btn-primary my-2">{{ __(' First subscribe') }}</a> 
                      </div>
                      @endguest
                    </div>
                  </div>
                </form>
              </div>
              {{-- Ends comment form --}}
  
              <div class="blog-comments">
                @if ($post->comments->count())
                <h4 class="comments-count">{{ $post->comments->count() }} {{ __('Comment') }}</h4><hr>
                @foreach ($post->comments as $comment )
                  
  
                <div id="comment-1" class="comment">
                  <div class="d-flex">
                    <div class="comment-img">
                     <a href="{{ asset($comment->user->image) }}">
                      <img 
                      class="img-account-profile rounded-circle mb-2"
                      class="user-circle-image-class"
                          src="{{ asset($comment->user->image)  }}" 
                          alt="{{ $comment->user->name }}`image">
                     </a>
                      <div>
                      <h5><a href="{{route('comment.owner',['id'=>$comment->user->id])}}">{{ $comment->user->name }}</a></h5>
                      <time datetime="2020-01-01">{{ $comment->created_at->diffForHumans(); }}</time>
                      <p>
                        {{ $comment->body }}
                      </p>
                    </div>
                  </div>
                </div>            
                @auth
                @if($comment->ownedBy(Auth()->user()))
                <div class="text-start">
                  <form action="{{ route('comment.destroy',$comment->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class=" mt-1 pt-1 btn text-danger underline">Delete</button>
                  </form>
                </div>
                @endif
                
                @endauth
                @endforeach
                @else
                <h6 class="text-center">{{ __('There is no comment yet') }}</h6><hr />
                @endif
                <!-- End comment #4 -->
              </div><!-- End blog comments --> 
            </div><!-- End blog entries list -->
          </div>
  
        </div>
      </section><!-- End Blog Single Section -->
@endsection               