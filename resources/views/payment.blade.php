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
     .payment{
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
  <div class="p-5 text-center bg-light caption-inte payment">
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
          <div class="col-md-3 step" id="step-2">
                <span class="step-number"><i class="fa-solid fa-check"></i></span>
                <p><a href="">CHOOSE PLACE</a> </p>
            </div>
            <div class="col-md-3 step reached">
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
<!--Payment-->
<div class="container pay">
    <div class="left">
          <div class="selected-seats">
            @php
              $total = 0;
            @endphp
            @foreach ($places as $place)         
            <div class="booking-seat-pay">
              <span>{{ $place->row }} row</span> <span>{{ $place->seat }} th seat</span> <span>{{ $place->price }} $</span> 
              @php
              $total +=  $place->price ;
              @endphp
            </div>
            @endforeach
          </div>
          <div class="total-price">Total: {{ $total }}$</div>
          <form action="/ticket/{{ $movie->id  }}" method="GET">
            <button type="button" class="btn btn-cancel" onclick="window.location.href='{{ url('/') }}'">Cancel</button>
            @csrf
            <input type="hidden" name="selected_seats" id="selected-seats-input">
            <input type="hidden" name="booking_date" id="booking-date-input">
         <button type="submit" class="btn btn-next">Next</button></a> 
        </form>
    </div>
<div class="container right">
  <div class="row">
    <div class="col-md-10 col-md-offset-3">
        <div class="panel panel-default credit-card-box">
            <div class="panel-body">
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
            <form action="" class="payment-form">
                <div class="row mt-5">
                    <div class="col mb-5">
                      <!-- Name input -->
                      <div data-mdb-input-init class="form-outline">
                        <input type="text" id="form8Example1" class="form-control" />
                        <label class="form-label" for="form8Example1">Name</label>
                      </div>
                    </div>
                  </div>
                  <div class="row g-3">
                    <div class="col-sm-9 mb-5" id="input-card">
                        <!-- Card number input -->
                        <div data-mdb-input-init class="form-outline d-flex align-items-center">
                          <input type="email" id="form8Example2" class="form-control" />
                          <label class="form-label" for="form8Example2">Card Number</label>
                        </div>
                      </div>
                      <div class="col-sm" id="type-card">                       
                        <div class="col card-icons ml-3">
                          <img src="{{ asset('images/visa.jpg') }}" alt="Visa" style="width: 30px; margin-left: 5px;">
                          <img src="{{ asset('images/master.png') }}" alt="MasterCard" style="width: 30px; margin-left: 5px;">
                          <img src="{{ asset('images/amex.jpg') }}" alt="Amex" style="width: 30px; margin-left: 5px;">
                        </div>
                      </div>
                  </div>                      
                  <div class="row">
                    <div class="col mb-5">
                      <!-- CVC input -->
                      <div data-mdb-input-init class="form-outline">
                        <input type="text" id="form8Example3" class="form-control" />
                        <label class="form-label" for="form8Example3">CVC</label>
                      </div>
                    </div> 
                    <div class="col mb-5">
                      <!-- Name input -->
                      <div data-mdb-input-init class="form-outline">
                        <input type="text" id="form8Example4" class="form-control" />
                        <label class="form-label" for="form8Example4">Expiration Month</label>
                      </div>
                    </div>
                    <div class="col mb-5">
                      <!-- Email input -->
                      <div data-mdb-input-init class="form-outline">
                        <input type="email" id="form8Example5" class="form-control" />
                        <label class="form-label" for="form8Example5">Expiration Year</label>
                      </div>
                    </div>
                  </div>
                </form>
            </div>
        </div>        
    </div>
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
 <!-- MDB -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
 <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

 <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {

        var $form = $(".require-validation"),

        inputSelector = ['input[type=email]', 'input[type=password]',

                         'input[type=text]', 'input[type=file]',

                         'textarea'].join(', '),

        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');  
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
           $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
});
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
           number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    });
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
           $form.get(0).submit();
       }
    }
});
</script>
<script>
  window.addEventListener("popstate", function(event) {
      fetch("{{ route('check.payment.status') }}")
          .then(response => response.json())
          .then(data => {
              if (data.payment_completed) {
                  window.location.href = "{{ route('home') }}"; // Change to your desired route
              }
          })
          .catch(error => console.error('Error checking payment status:', error));
  });
</script>
 <!--file JS-->
 <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>