<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet"/>
    <!--File css-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body>
  <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container-fluid">
      <!-- Toggle button -->
      <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button> 
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="15"alt="MDB Logo"loading="lazy"/>
        </a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/movie') }}">Movie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->
<!--Carousel-->
<div class="carousel">
    <div class="list">
      @foreach ( $slideMovie as $slideMovies)
      <div class="item">
        <img src="{{ $slideMovies->big_img }}" >
    <div class="content">
        <div class="author">CINEMA</div>
        <div class="title">MOVIE</div>
        <div class="topic">{{ $slideMovies->title }}</div>
        <div class="des">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        </div>
        <div class="buttons">
            <button>SEE MORE</button>
        </div>
    </div>
</div>
      @endforeach
    </div>
    <!--thumbnail-->
    <div class="thumbnail">
      @foreach ( $slideMovie as $slideMovies)
        <div class="item">
            <img src="{{ $slideMovies->big_img }}">
            <div class="content">
                <div class="title">
                    Name Slider
                </div>
                <div class="des">
                    Description
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="arrows">
        <button id="prev"><</button>
        <button id="next">></button>
    </div>
    <div class="time"></div>
</div>
<!--cards 1-->
<div class="row g-4 movies">
    <div class="movies-title">
        <h1>Opening this week</h1>
    </div>
    @foreach ($opening as $open)   
    <div class="col-6 col-md-4 col-lg-3 col-xl-2-4">
      <a href="/sch/{{ $open->movie->id }}">
        <div class="card h-100">
        <img src="{{ $open->movie->small_img }}" class="card-img-top" alt="Skyscrapers"/>
        <div class="card-body">
          <h5 class="card-title">{{ $open->movie->title }}</h5>
        </div>
      </div>
    </a>
    </div>
    @endforeach
    <div class="my-pagination">
      {{ $opening->links() }}
    </div>
  </div>
<!--COMMING SOON-->
<div class="comming-title">
  <h1>Comming soon</h1>
</div>
<div class="comming">
<div class="container comming-container">
  <input type="radio" name="slider" id="s1" checked>
  <input type="radio" name="slider" id="s2">
  <input type="radio" name="slider" id="s3">
  <input type="radio" name="slider" id="s4">
  <input type="radio" name="slider" id="s5">
  <div class="cards">
    @php
    $i = 0;
    @endphp
    @foreach ($comming as $come)
      @php
        $i++;
      @endphp
    <label for="s{{ $i }}" id="slide{{ $i }}">
      <div class="card">
        <div class="image">
          <img src="{{ $come->movie->small_img }}" alt="">
        </div>
      </div>
    </label>
    @endforeach
  </div>
</div>
</div>

<!-- Footer -->
<footer class="text-center text-lg-start text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="icon-wrapper me-2 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="icon-wrapper me-2 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="icon-wrapper me-2 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="icon-wrapper me-2 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
    <!--file JS-->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
</body>
</html>