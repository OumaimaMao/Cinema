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
    <title>Document</title>
    <style>

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
            <div class="col-md-3 step">
                <span class="step-number"><i class="fa-solid fa-check"></i></span>
                <p><a href="">SCHEDULE</a> </p>
            </div>
          <div class="col-md-3 step reached">
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
<!--Place-->
<div class="container booking">
    <div class="left">
          <div class="selected-seats">
          </div>
          <div class="total-price">Total: </div>
          <form action="/payment/{{ $movie->id  }}/{{ $schedule->date }}/{{ $schedule->time }}" method="POST">
            <button type="button" class="btn btn-cancel" onclick="window.location.href='{{ url('/') }}'">Cancel</button>
            @csrf
            <input type="hidden" name="selected_seats" id="selected-seats-input">
            <input type="hidden" name="booking_date" id="booking-date-input">
         <button type="submit" class="btn btn-next">Next</button></a> 
        </form>
    </div>
<div class="right-container">
    <div class="right">       
        <div class="screen"></div>
        <!-- Seat Grid (Cinema-style layout) -->
        <div class="seat-grid">
          @foreach ($place as $row => $seats )
              <div class="seat-row">
                @foreach ($seats as $seat)
                @if($bookedSeats->contains('idplace', $seat->id))
                <div class="seat unavailable" data-row="{{ $seat->row }}" data-seat="{{ $seat->seat }}" data-price="{{ $seat->price }}" data-id='{{ $seat->id }}' style='pointer-events:none; background-color: rgb(30, 31, 32); cursor: not-allowed;'></div>
                @else
                <div class="seat available" data-row="{{ $seat->row }}" data-seat="{{ $seat->seat }}" data-price="{{ $seat->price }}" data-id='{{ $seat->id }}'></div>
                @endif
                @endforeach
              </div>
            @endforeach
    </div> 
  </div>
        <div class="seat-details">
          <ul>
            <li><span>Date:</span> <span>{{ \Carbon\Carbon::parse($schedule->date)->format('d') }} {{ \Carbon\Carbon::parse($schedule->date)->format('M') }}</span></li>
            <li><span>Time:</span> <span>{{ \Carbon\Carbon::parse($schedule->time)->format('h:i A') }}</span></li>
            <li><span>Type:</span> <span>{{ $movie->type }}</span></li>
            <li><span>Duration:</span> <span>{{ $movie->duration }}</span></li>
          </ul>
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
        <a href="" class="icon-wrapper me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="icon-wrapper me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="icon-wrapper me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="icon-wrapper me-4 text-reset">
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
 <!-- MDB -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
<script>
  document.querySelectorAll('.seat').forEach(seat => {
    seat.addEventListener('click', function() {
        this.classList.toggle('selected');
        updateSelectedSeats();
    });
});
function updateSelectedSeats(){
  const selectedSeats = document.querySelectorAll('.seat.selected');
  const selectedSeatsContainer  = document.querySelector('.selected-seats');
  const totalPriceContainer  = document.querySelector('.total-price');
  
  let selectedSeatData = [];
  let totalPrice = 0;

  selectedSeatsContainer.innerHTML = ''; 
  if (selectedSeats.length > 0) {
     selectedSeatsContainer.style.display = 'block';

  selectedSeats.forEach(seat => {
    const row = seat.getAttribute('data-row');
    const seatNumber = seat.getAttribute('data-seat');
    const price = parseFloat(seat.getAttribute('data-price'));
    const seatInfo = `<div class="booking-seat" data-row="${row}" data-seat="${seatNumber}">
                            <span>${row} row</span> <span>${seatNumber}th seat</span> <span>${price}$</span> 
                            <button class="remove-seat">X</button>
                      </div>`;
  selectedSeatsContainer.insertAdjacentHTML('beforeend', seatInfo);
selectedSeatData.push({ row, seatNumber, price });
totalPrice += price;
  });
  totalPriceContainer.innerText = `Total: ${totalPrice}$`;
} else {
            // Hide seat information container and buttons if no seats are selected
            selectedSeatsContainer.style.display = 'none';
        }
// Store selected seat data for next step
document.querySelector('.btn-next').setAttribute('data-seats', JSON.stringify(selectedSeatData));
}
//remove button
document.addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('remove-seat')) {
        const seatDiv = e.target.closest('.booking-seat');
        const seatRow = seatDiv.getAttribute('data-row');
        const seatNumber = seatDiv.getAttribute('data-seat');
        
        // Find the corresponding seat in the seat grid and unselect it
        const seatToDeselect = document.querySelector(`.seat[data-row="${seatRow}"][data-seat="${seatNumber}"]`);
        if (seatToDeselect) {
            seatToDeselect.classList.remove('selected');
        }
        updateSelectedSeats(); // Update seat list and total
    }
});
//data
document.querySelector('.btn-next').addEventListener('click', function() {
    const selectedSeats = this.getAttribute('data-seats');    
    document.getElementById('selected-seats-input').value = selectedSeats;
});
</script>
</body>
</html>