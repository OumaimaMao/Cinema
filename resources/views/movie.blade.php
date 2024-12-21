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
    <title>Movies</title>
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
            <a class="nav-link" href="#">Movie</a>
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
        <div class="title">{{ $slideMovies->title }}</div>
        <div class="topic">MOVIE</div>
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
<div class="filter-container">
  <div class="filter-items-row">
    <div class="filter-item">
      <a class="filter-link" data-filter="all" href="#">All</a></div>
    <div class="filter-item">
      <div class="dropdown">
        <a class="dropdown-toggle" id="dropdownMenuButton" data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">By Date
      </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          @foreach ($date as $dateKey => $dates)
          <li><a class="dropdown-m,,,,,,,,,,,,,,,,,,,,item filter-link" href="#" data-filter="date" data-value="{{ $dateKey }}">{{ $dateKey }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="filter-item">
      <div class="dropdown">
        <a class="dropdown-toggle" id="dropdownMenuButton" data-mdb-dropdown-init data-mdb-ripple-init aria-expanded="false">By Category
      </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          @foreach ($category as $categories)
          <li>
            <a class="dropdown-item filter-link" href="#" data-filter="category" data-value="{{ $categories->id }}">{{ $categories->name }}</a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
    <div class="search-bar">
      <input type="text" class="form-control" id="movieSearch" name="movieName" placeholder="Search by name">
      <span><i class="fa-solid fa-magnifying-glass"></i></span>
    </div>
</div>
<!--Movies-->
<div class="row g-4 movies" id="moviesContainer">
    @foreach ($movie as $movies)   
    <div class="col-6 col-md-4 col-lg-3 col-xl-2-4">
      <a href="/sch/{{ $movies->id }}">
        <div class="card h-100">
        <img src="{{ $movies->small_img }}" class="card-img-top" alt="Movie image"/>
        <div class="card-body">
          <h5 class="card-title">{{ $movies->title }}</h5>
        </div>
      </div>
    </a>
  </div>
    @endforeach
    <div class="my-pagination">
      {{ $movie->links() }}
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
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
</footer>
<!-- Footer -->
    <!--file JS-->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
<!--AJAX-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    // Trigger search and filter updates
    $('#movieSearch').on('keyup', function () {
      let query = $(this).val();
      fetchMovies({ movieName: query });
    });

    // Handle filter clicks (by date, category, or 'all')
    $('.filter-link').on('click', function (e) {
      e.preventDefault();
      let filterType = $(this).data('filter');
      let filterValue = $(this).data('value');
      let filterParams = {};

      if (filterType === 'all') {
        filterParams = {}; // No filters, fetch all movies
      } else if (filterType === 'date') {
        filterParams.date = filterValue; // Filter by date
      } else if (filterType === 'category') {
        filterParams.category = filterValue; // Filter by category
      }

      fetchMovies(filterParams); // Fetch movies with applied filters
    });

    // Fetch movies via AJAX
    function fetchMovies(params = {}) {
      $.ajax({
        url: "{{ route('search') }}", // Ensure this route points to your search method
        type: 'GET',
        data: params, // Pass the filter/search parameters
        success: function (data) {
          let movieHtml = '';
          let paginationHtml = '';

          if (data.data.length > 0) {
            data.data.forEach(movie => {
              movieHtml += `
                <div class="col-6 col-md-4 col-lg-3 col-xl-2-4">
                  <a href="/sch/${movie.id}">
                    <div class="card h-100">
                      <img src="${movie.small_img}" class="card-img-top" alt="Movie Image"/>
                      <div class="card-body">
                        <h5 class="card-title">${movie.title}</h5>
                      </div>
                    </div>
                  </a>
                </div>`;
            });

            // Set pagination HTML
            paginationHtml = `
              <div class="my-pagination">
                ${data.links}
              </div>`;
          } else {
            movieHtml = '<div class="col-12 msgError"><p>No movies found.</p></div>';
          }

          // Update movies and pagination
          $('#moviesContainer').html(movieHtml + paginationHtml);
        },
        error: function (xhr, status, error) {
          console.error('AJAX Error: ', status, error);
        }
      });
    }
  });
</script>
</body>
</html>