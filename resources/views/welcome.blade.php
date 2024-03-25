@extends('layouts.app')
@section('title','Home page')
@section('content')
  <!-- ======= Header ======= -->


  <!-- ======= Hero Section ======= -->
  {{-- <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">
        @foreach ($slides as $slide )
        <div class="carousel-item {{ ($loop->index == 0) ? 'active':'' }}" style="background-image: url('{{ $slide->image }}');background-repeat: no-repeat; background-size: cover; background-position: center; @media (max-width: 767px) { background-size: contain; }">
          <div class="carousel-container">
            <div style="background-color: rgb(0 0 , 44);
            border-radius: 10px;
            letter-spacing: 1px;" class="carousel-content animate__animated animate__fadeInUp">
              <h2>{{ $slide->title_en }}</h2>
              <p class="">{{ $slide->body_en }}</p>
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
  </section> --}}
  <!-- End Hero -->
  {{--N  starts --}}
   @if($slides)
   <div class="main-banner">
    <div class="owl-carousel owl-banner">
      @foreach ($slides as $slide )

      <div class="item item-3">
        <div class="header-text">
          <span class="category">{{ $slide->title_en }}</em></span>
          <h2>Act Now!<br>Get the highest level penthouse </h2>
        </div>
      </div>

      @endforeach
    </div>
  </div>
   @else

   @endif
  <div class="featured section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image">
            <img src="{{asset('assets/images/featured.jpg') }}" alt="">
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h6>| Mahallamiz RAISi</h6>
            <h2>Ramziddin Rustamov </h2>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Qanday masalar buyicha murojat qilish mumkun ?

                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                Get <strong>the best school</strong> website template in HTML CSS and Bootstrap for your business. TemplateMo provides you the <a href="https://www.google.com/search?q=best+free+css+templates" target="_blank">best free CSS templates</a> in the world. Please tell your friends about it.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Ish soatlar ?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Mahallamiz muammolari haqida aloqaga chisam bo'ladimi ?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Dolor <strong>almesit amet</strong>, consectetur adipiscing elit, sed doesn't eiusmod tempor incididunt ut labore consectetur <code>adipiscing</code> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="info-table">
            <ul>
              <li>
                <i style="color:#f35525" class="fas fa-clock fa-3x"></i>
                <h4>Ishlash soatlari <br><span>08:00 - 17: 00</span></h4>
              </li>
              <li>
                <i style="color:#f35525" class="fas fa-mail-bulk fa-3x"></i>
                <h4>Email<br><span>email@gmail.com</span></h4>
              </li>
              <li>
                <i style="color:#f35525" class="fas fa-phone fa-3x"></i>
                <h4>Telefon <br><span>+9989 771 39 09</span></h4>
              </li>
              <li>
                <i style="color:#f35525" class="fas fa-map-location fa-3x"></i>
                <h4>Manzili<br><span>mangitobod fuqorolar yig'ini</span></h4>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- video section s --}}


  <div class="video section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Vedio orqali </h6>
            <h2>Mahalla  Haqida Toliqroq Ma'lumot oling !</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="video-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="video-frame">
            <img src="{{asset('assets/images/village-video.jpg')}}" alt="">
            <a href="https://www.youtube.com/watch?v=cP3atIcadGE" target="_blank"><i class="fa fa-play"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- video section end  --}}

  {{-- facts section started --}}

  <div class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-4 pb-5 ">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="8500" data-speed="1000"></h2>
                   <p class="count-text ">Aholi <br>Soni</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="3400" data-speed="1000"></h2>
                   <p class="count-text ">Yoshlarimiz<br>dan ko'p</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="334" data-speed="1000"></h2>
                   <p class="count-text ">Pensiyanerlar<br>dan ko'p</p>
                </div>
              </div>
              <div class="col-lg-4 pb-5">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="2" data-speed="1500"></h2>
                   <p class="count-text">Maktablar<br>soni</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="12" data-speed="1000"></h2>
                  <p class="count-text ">Bog'cha<br>soni</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="2" data-speed="1000"></h2>
                  <p class="count-text ">Masjidlari<br>soni</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="200" data-speed="1000"></h2>
                  <p class="count-text ">Dukonlar<br>soni</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="1" data-speed="1000"></h2>
                  <p class="count-text ">Shifoxona<br>soni</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="10" data-speed="1000"></h2>
                  <p class="count-text ">Xizmat ko'<br>rsatish</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- facts section ened  --}}

  {{-- facts 2 section started --}}


  <div class="section best-deal">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="section-heading">
            <h6>| Eng yaxshi jihatlarimz</h6>
            <h2>Yaqindan tanishing </h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#young" type="button" role="tab" aria-controls="young" aria-selected="true">Yoshlar haqida</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="hospital-tab" data-bs-toggle="tab" data-bs-target="#hospital" type="button" role="tab" aria-controls="hospital" aria-selected="false">Shifoxonamiz</button>
                  </li>
				  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="kindergarten-tab" data-bs-toggle="tab" data-bs-target="#kindergarten" type="button" role="tab" aria-controls="kindergarten" aria-selected="false">Maktabgacha ta'lim</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="school-tab" data-bs-toggle="tab" data-bs-target="#school" type="button" role="tab" aria-controls="school" aria-selected="false">Maktablarimiz</button>
                  </li>

                </ul>
              </div>
              <div class="tab-content" id="myTabContent">
                <!-- young start -->
				<div class="tab-pane fade show active" id="young" role="tabpanel" aria-labelledby="young-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Yoshlar <span>1 400 ta </span></li>
                          <li>Sovrindorlari <span>200</span></li>
                          <li>Til buyicha s.t<span>4</span></li>
                          <li>Alimpeyada sovrindorlari <span>20 ta </span></li>
                          <li>Oliy ta'limda  <span>30 ta </span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img class="thuminale" src="{{asset('assets/images/youth.jpg ')}}" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Extra Info About Property</h4>
                      <p>
                        Rahmat! Sizga kerakli ma'lumotlarni taqdim etishim mumkin. "TemplateMo" veb-sayti, bepul CSS shriftlarini taklif etadi va ommaviy veb-saytlarida qidiruv motorlarida "TemplateMo" nomini qidirishingiz yoki "TemplateMo Portfolio", "TemplateMo One Page Layouts"
                        kabi so'rovlarni kiriting. Bu usullar orqali siz uyingiz uchun mos veb-dizaynlarni topishingiz mumkin..</p>
                      <div class="icon-button">
                        <a href="property-details.html"><i class="fa fa-users"></i> Yoshlarimiz ...</a>
                      </div>
                    </div>
                  </div>
                </div>
				<!-- young end -->

               <!-- hospital -->
			   <div class="tab-pane fade" id="hospital" role="tabpanel" aria-labelledby="hospital-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Flat Space <span>250 m2</span></li>
                          <li>Floor number <span>26th</span></li>
                          <li>Number of rooms <span>5</span></li>
                          <li>Parking Available <span>Yes</span></li>
                          <li>Payment Process <span>Bank</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="{{asset('assets/images/hospital.avif')}}" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Detail Info About Villa</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse. <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper mug, succulents typewriter shaman DIY kitsch twee taiyaki fixie hella venmo after messenger poutine next level humblebrag swag franzen.</p>
                      <div class="icon-button">
                        <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule a visit</a>
                      </div>
                    </div>
                  </div>
                </div>
			   <!-- hospital -->

				<div class="tab-pane fade" id="school" role="tabpanel" aria-labelledby="school-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Flat Space <span>250 m2</span></li>
                          <li>Floor number <span>26th</span></li>
                          <li>Number of rooms <span>5</span></li>
                          <li>Parking Available <span>Yes</span></li>
                          <li>Payment Process <span>Bank</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="{{asset('assets/images/school.png')}}" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Detail Info About Villa</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse. <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper mug, succulents typewriter shaman DIY kitsch twee taiyaki fixie hella venmo after messenger poutine next level humblebrag swag franzen.</p>
                      <div class="icon-button">
                        <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule a visit</a>
                      </div>
                    </div>
                  </div>
                </div>
                 <div class="tab-pane fade" id="kindergarten" role="tabpanel" aria-labelledby="kindergarten-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>Total Flat Space <span>320 m2</span></li>
                          <li>Floor number <span>34th</span></li>
                          <li>Number of rooms <span>6</span></li>
                          <li>Parking Available <span>Yes</span></li>
                          <li>Payment Process <span>Bank</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="{{asset('assets/images/kindergarten.jpg')}}" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Extra Info About Penthouse</h4>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, do eiusmod tempor pack incididunt ut labore et dolore magna aliqua quised ipsum suspendisse. <br><br>Swag fanny pack lyft blog twee. JOMO ethical copper mug, succulents typewriter shaman DIY kitsch twee taiyaki fixie hella venmo after messenger poutine next level humblebrag swag franzen.</p>
                      <div class="icon-button">
                        <a href="property-details.html"><i class="fa fa-calendar"></i> Schedule a visit</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- facts 2 ended  --}}

  {{-- contact and others started  --}}

  <div class="properties section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| O'chrashuvlar | Bajarilgan ishlar </h6>
            <h2>Biz yaxshi bilganlarimizni siz bilan ilindik !</h2>
          </div>
        </div>
      </div>
      <div class="row">
        @if ($postCount)
        @foreach ($posts as $post)
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="{{asset('assets/images/property-01.jpg')}}" alt=""></a>
                <span class="category">Yangilik </span>

            <h6><i class="fas fa-calendar-check"></i>  {{ ''.$post->created_at->format('d-m-Y')}}</h6>
            <h4>
            <a href="{{ route('posts.findOne',$post->id) }}">
                {{ substr(strip_tags($post->title_en), 0, 100) }}
                {{ strlen(strip_tags($post->title_en)) > 55 ? "..." : "" }}
            </a></h4>
           <p>
            {{ substr(strip_tags($post->body_en), 0, 150) }}
            {{ strlen(strip_tags($post->body_en)) > 150 ? "....." : "" }}
           </p>
            <div class="main-button">
              <a href="property-details.html">Ko'proq o'qish</a>
            </div>
          </div>
        </div>
        @endforeach
        <div class=" justify-content-end text-align-end d-flex pt-2">
          <a href="{{ route('posts.allposts') }}" class="btn btn-primary text-center font-weight-bold"> View more</a>
        </div>
        <!-- End blog sidebar -->
        @else
        <h6 class="text-center font-weight-bold">{{ __('There is no post yet, wait ') }}</h6><hr>
        @endif
        {{-- <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="{{asset('assets/images/property-02.jpg')}}" alt=""></a>
            <span class="category">Luxury Villa</span>
            <h6>$1.180.000</h6>
            <h4><a href="property-details.html">54 Mid Street Florida, OR 27001</a></h4>
            <ul>
              <li>Bedrooms: <span>6</span></li>
              <li>Bathrooms: <span>5</span></li>
              <li>Area: <span>450m2</span></li>
              <li>Floor: <span>3</span></li>
              <li>Parking: <span>8 spots</span></li>
            </ul>
            <div class="main-button">
              <a href="property-details.html">Schedule a visit</a>
            </div>
          </div>
        </div> --}}
        {{-- <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="{{asset('assets/images/property-03.jpg')}}" alt=""></a>
            <span class="category">Luxury Villa</span>
            <h6>$1.460.000</h6>
            <h4><a href="property-details.html">26 Old Street Miami, OR 38540</a></h4>
            <ul>
              <li>Bedrooms: <span>5</span></li>
              <li>Bathrooms: <span>4</span></li>
              <li>Area: <span>225m2</span></li>
              <li>Floor: <span>3</span></li>
              <li>Parking: <span>10 spots</span></li>
            </ul>
            <div class="main-button">
              <a href="property-details.html">Schedule a visit</a>
            </div>
          </div>
        </div> --}}
        {{-- <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="{{asset('assets/images/property-04.jpg')}}" alt=""></a>
            <span class="category">Apartment</span>
            <h6>$584.500</h6>
            <h4><a href="property-details.html">12 New Street Miami, OR 12650</a></h4>
            <ul>
              <li>Bedrooms: <span>4</span></li>
              <li>Bathrooms: <span>3</span></li>
              <li>Area: <span>125m2</span></li>
              <li>Floor: <span>25th</span></li>
              <li>Parking: <span>2 cars</span></li>
            </ul>
            <div class="main-button">
              <a href="property-details.html">Schedule a visit</a>
            </div>
          </div>
        </div> --}}
        {{-- <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="{{asset('assets/images/property-05.jpg')}}" alt=""></a>
            <span class="category">Penthouse</span>
            <h6>$925.600</h6>
            <h4><a href="property-details.html">34 Beach Street Miami, OR 42680</a></h4>
            <ul>
              <li>Bedrooms: <span>4</span></li>
              <li>Bathrooms: <span>4</span></li>
              <li>Area: <span>180m2</span></li>
              <li>Floor: <span>38th</span></li>
              <li>Parking: <span>2 cars</span></li>
            </ul>
            <div class="main-button">
              <a href="property-details.html">Schedule a visit</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="item">
            <a href="property-details.html"><img src="{{asset('assets/images/property-06.jpg')}}" alt=""></a>
            <span class="category">Modern Condo</span>
            <h6>$450.000</h6>
            <h4><a href="property-details.html">22 New Street Portland, OR 16540</a></h4>
            <ul>
              <li>Bedrooms: <span>3</span></li>
              <li>Bathrooms: <span>2</span></li>
              <li>Area: <span>165m2</span></li>
              <li>Floor: <span>26th</span></li>
              <li>Parking: <span>3 cars</span></li>
            </ul>
            <div class="main-button">
              <a href="property-details.html">Schedule a visit</a>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </div>

  <div class="contact section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 offset-lg-4">
          <div class="section-heading text-center">
            <h6>| Biz bilan bog'laning </h6>
            <h2>Biz bilan aloqaga chiqing </h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div id="map">
            <iframe src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=Mangitobod%20Neighborhood%20Samarkand+(Mangitobod%20mahallasi)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="500px" frameborder="0" style="border:0; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.15);" allowfullscreen=""></iframe>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="item phone">
                <img src="{{asset('assets/images/phone-icon.png')}}" alt="" style="max-width: 52px;">
                <h6>+998 99 771 39 09<br><span>Phone Number</span></h6>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="item email">
                <img src="{{asset('assets/images/email-icon.png')}}" alt="" style="max-width: 52px;">
                <h6>email@.uz<br><span> Email Pochtamiz</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <form id="contact-form" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <label for="name">F.I.SH</label>
                  <input type="name" name="name" id="name" placeholder="Ismi sharifingiz " autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="email">Email pochtangiz <span class="text-danger"> [ majburiy emas ]</span></label>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email pochtangizni kiriting " required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="subject">Nima buyicha  ? </label>
                  <input type="subject" name="subject" id="subject" placeholder="Masalangiz nima ?" autocomplete="on" >
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="message">Masalangiz buyicha xabr qoldiring !</label>
                  <textarea name="message" id="message" placeholder="Xabaringizni shu yerga yozib qoldiring ..."></textarea>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="orange-button">Xabarni yuborish </button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  {{--  concact and others ended --}}
  {{-- N end  --}}
  {{-- <section id="blog" class="blog">
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
  </section> --}}
  <!-- End Blog Section -->


  {{-- <main id="main">
  <!-- ======= Our Team Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container">

      <div class="section-title">
        <h2 class="font-weight-bold text-success">Our <strong>Team</strong></h2>
        <p>"Our team is a cohesive and passionate force, driving excellence
          through collaboration, diversity, and a shared commitment to making a positive impact."</p>
      </div>

      <div class="row justify-content-around">
        @if ($teamCount)
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
  </section>
  <!-- End Our Team Section -->

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

     <!-- ======= Our Clients Section ======= -->
     <section id="clients" class="clients">
        <div class="container">

          <div class="section-title">
            <h2 class="text-success font-weight-bold ">Certificates</h2>
          </div>

          <div class="row text-center justify-content-center">
            {{-- <div class="col-lg-3 col-md-6 col-6">
                <img src="assets/img/clients/clientIT.jpg" class="img-fluid" alt="">
            </div>
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
            <img style="width: 100%;" class="shadow p-3 mb-5 bg-body rounded" src="{{ asset(json_decode($item->image)[0]) }}"   alt="Portfolio image">
            <div class="portfolio-info">
              <h4>{{ $item->category }} </h4>
              <p>{{  $item->category  }}</p>
              <a href="{{ asset(json_decode($item->image)[0]) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Portfolio image"><i class="bx bx-plus"></i></a>
              <a href="{{ route('portfolio.show',['id'=>$item->id]) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
              @if (strpos($item->link, 'https://') === 0)
              <a target="_blank" href="{{$item->link}}" class="" title="More Details"><i class="bx bx-world"></i></a>
             @else
              <a target="_blank" href="https://{{$item->link}}" class="" title="More Details"><i class="bx bx-world"></i></a>
             @endif
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

        <div class="row text-center justify-content-center">
          {{-- <div class="col-lg-3 col-md-6 col-6">
              <img src="assets/img/clients/clientIT.jpg" class="img-fluid" alt="">
          </div>
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

  </main> --}}
  <!-- End #main -->


@endsection
