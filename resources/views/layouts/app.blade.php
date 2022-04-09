<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Favicons -->
  <link href="{{ asset('assets/img/i.png') }} " rel="icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{asset('/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }} " rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }} " rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    @if(Request::is('profile'))
    <link href="{{ asset('assets/vendor/custom/style.css') }}" rel="stylesheet">
  @endif
</head>
<body>
     <!-- ======= Header ======= -->
  <header id="header" class="fixed-top mb-5 ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="/"><span>i</span>Coders</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="/" class="{{ (Request::is('/') ? 'active' : '') }}">Home</a></li>

          <li class="dropdown "><a href="#"><span class="{{ (Request::is('about') ? 'active' : '') }} {{ (Request::is('view') ? 'active' : '') }}">About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li ><a href="{{ route('about') }}"  >About Us</a></li>
              <li><a href="{{ route('view') }}">Our Clients view</a></li>
            </ul>
          </li>

          <li><a href="{{ route('services') }}"    class="{{ (Request::is('services') ? 'active' : '') }}">Services</a></li>
          <li><a href="{{ route('portfolio') }}"   class="{{ (Request::is('portfolio') ? 'active' : '') }}">Portfolio</a></li>
          <li><a href="{{ route('price.index') }}" class="{{ (Request::is('price') ? 'active' : '') }}">Pricing</a></li>
          <li><a href="{{ route('contact') }}"     class="{{ (Request::is('contact') ? 'active' : '') }}">Contact</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links ps-2 d-flex">
        <ul class="navbar-nav ms-auto d-md-flex d-lg-flex ">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item ">
                        <a style="{{ (Request::is('login') ? 'color: green; text-decoration: underline;' : '') }}" class="nav-link " href="{{ route('login') }}"><span>{{ __('Login') }}</span></a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item active">
                        <a style="{{ (Request::is('register') ? 'color: green; text-decoration: underline;' : '') }}"  class="nav-link {{ (Request::is('register') ? 'active' : '') }}" href="{{ route('register') }}"><span>{{ __('Register') }}</span></a>
                    </li>
                @endif
            @else         
                <li class="nav-item dropdown d-flex "  id="navbarDropdown">
                    <a class="ps-md-3 " href="{{ asset(Auth::user()->image)  }}">
                      <img 
                       class="user-circle-image-class"
                      src="{{ asset(Auth::user()->image)  }}" 
                      alt="{{ Auth::user()->name }} `s image'">      
                    </a>
                    <a style="padding-top:16px" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ explode(" ", Auth::user()->name)[0] }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      {{-- Main menu --}}
                      <a class="dropdown-item py-3  " href="/">
                        <i class="bx bx-home text-success"></i>    {{ __('Main Page') }}
                      </a>
                      {{-- My Profile --}}
                       <a class="dropdown-item py-3  " href="{{ route('profile.index') }}">
                         <i class="bx bx-user text-success"></i>    {{ __('My profile') }}
                       </a>
                      {{-- dashboard --}}
                      @can('admin')
                      <a class="dropdown-item py-3" href="{{ route('home') }}">
                        <i class="bx bx-message text-success"></i>   {{ __('Dashboard') }} <i class="fa fa-list"></i>
                      </a>
                      @endcan
                        <a class="dropdown-item py-3" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        <i class="bx bx-exit text-success"></i> {{ __('Logout') }}
                       </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>   <!-- Right Side Of Navbar --> 
      </div>
    </div>
  </header> 
  <!--!End Header-->
   
        <main id="app">
            @yield('content')
        </main>

         <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Company</h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>
          @guest
          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
          @endguest

          @auth
          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>{{ __('Our link') }}</h4>
            <img style="width: 166px;
            height: auto;
            background-repeat: no-repeat;" src="{{ asset('assets/img/ic.png') }}" alt="Web site link">
          </div>
          @endauth

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>iCoder</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
        
          Designed by <a href="#">iCoders</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> 

 

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
 
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
