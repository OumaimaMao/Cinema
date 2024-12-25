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
        <!--Font awsome-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sixtyfour+Convergence&display=swap" rel="stylesheet">
    <title>Schedule</title>
    <style>
      .schedule{
        background-image: linear-gradient(rgba(0, 0, 0, 0.415),rgba(0, 0, 0, 0.400)),url({{ asset($movie->big_img) }});
      } 
    </style>
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
            <a class="nav-link" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Movie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->
<!--Interface-->
<div class="interface">
  <div class="p-5 text-center bg-light caption-inte schedule">
      <div class="container" style="position: absolute; top: 50%; left: 0; width: 100%; transform: translateY(-55%);">
          <div class="row mx-lg-n5">
            <div class="col-md-6 py-3 px-lg-5">
              <div class="div-caption d-flex align-items-center">
                <img src="{{ asset($movie->small_img) }}" alt="Small Image" class="small-image">
                 <h1>{{ $movie->title }}</h1>
              </div>
            </div>
          </div>
      </div>
  </div>
  <!-- Steps Section -->
  <div class="steps-container text-light p-3">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 step reached">
                <span class="step-number ">1</span>
                <p><a href="">SCHEDULE</a> </p>
            </div>
          <div class="col-md-3 step" id="step-2">
                <span class="step-number">2</span>
                <p><a href="">CHOOSE PLACE</a> </p>
            </div>
            <div class="col-md-3 step">
                <span class="step-number">3</span>
                <p><a href="">PAYMENT</a> </p>
            </div>
            <div class="col-md-3 step">
                <span class="step-number">4</span>
                <p><a href="">TICKET</a> </p>
            </div>
        </div>
    </div>
</div>
</div>
<!--Detail-->
<div class="container detail">
  <div class="left">
    <h3>Detail</h3>
    <div class="info-list">
      <ul>
        <li><span>Country:</span> <span>{{ $movie->country }}</span></li>
        <li><span>Language:</span> <span>{{ $movie->language }}</span></li>
        <li><span>Release date:</span> <span>{{ $movie->release_date }}</span></li>
        <li><span>Director:</span> <span>{{ $movie->director }}</span></li>
        <li><span>Category:</span> <span>{{ $category->name }}</span></li>
      </ul>
    </div>
  </div>
  <div class="container right">
    @foreach($schedules as $date => $scheduleGroup)
    <div class="date-section">
      <div class="date">
        <span>{{ \Carbon\Carbon::parse($date)->format('d') }}</span><br>{{ \Carbon\Carbon::parse($date)->format('M') }}
      </div>
      <div class="times">
        @foreach($scheduleGroup as $schedule)
          @if($schedule->isFullyBooked)
           <span> <button class="schedule-btn">{{ \Carbon\Carbon::parse($schedule->time)->format('h:i A') }}</button>
            <p class="error-message">No available seats</p>
          </span>
          @else
          <a href="/place/{{ $movie->id }}/{{ $date }}/{{ $schedule->time }}"><button  class="schedule-btn">{{ \Carbon\Carbon::parse($schedule->time)->format('h:i A') }}</button></a>
          @endif
        @endforeach
      </div>
    </div>
    @endforeach
  </div>
</div>
<!--STORYLINE-->
<div class="container storyline">
  <div class="actors">
    <h3>Actors</h3>
    @foreach( $actor as $actors)
    <div class="actor mt-3">
      <img src="{{ asset($actors->actor_img) }}" alt="Actor 1" />
      <p>{{ $actors->name }}</p>
  </div>
  @endforeach
  </div>
  <div class="storyline-right">
    <h3>Storyline</h3>
    <p>{{ $movie->storyline }}</p>
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
 <!--file JS-->
 <script src="{{ asset('js/app.js') }}"></script>
  <!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
</body>
</html>