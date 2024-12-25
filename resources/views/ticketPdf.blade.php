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

    <title>Document</title>
    <style>
         table{
            width: 100%;
            border-collapse: collapse;
            border: 0.5px solid black;
            border-radius: 10px;
            border-radius: 30px;
            overflow: hidden;
        }
        .ticket-table {
            width: 100%;
            margin-bottom: 20px;
            border: 0.5px solid black;
            border-radius: 30px !important;
            overflow: hidden;
        }
        .ticket-left, .ticket-right {
            vertical-align: top;
        }
        .ticket-left {
            padding: 10px;
            background-color: #fff;
        }
        .ticket-right {
            width: 60%;
            background-color: #ddd;
            background-image: url('{{ public_path($movie->small_img) }}');
            background-size: cover;
            background-position: center;
            padding: 20px;
        }
        .ticket-info {
            font-size: 12px;
        }
        .ticket-info p {
            font-size: 12px;
            font-weight: bold;
            margin: 0;
            color: black;
            display: flex;
            justify-content: flex-start;
        }
         .ticket-info span {
            font-weight: normal;
            font-size: 12px;
            font-weight: bold;
            color: #000000;
        }
         .row-seat, .date-time {
            display: flex;
            flex-direction: column;
        }
        .barcode{
            width: 80px !important;
            height: auto !important;;
        }
        .barcode img {
            width: 150px !important;
            height: auto !important;;
        }
        .movie-details {
            color: white;
            font-size: 18px;
        }
        .movie-details h2 {
            margin-bottom: 10px;
        }
        .details p {
            margin: 5px 0;
        }
        .cinema-name {
            font-weight: bold;
            text-align: center !important;
            margin-top: 10px;
        }
        .row-seat-date-wrapper{
            display: flex;
            justify-content: space-between;
        /*  gap: 20px; */
        }

    </style>
</head>
<body>
<!--Tickets-->
<div class="container">
   @foreach ($selectedSeats as $index => $seat)
   @php
   $ticket = $tickets[$index] ?? null; 
   @endphp
       <table class="ticket-table" style="width: 50%;">
           <tr>
               <td class="ticket-left">
                   <div class="ticket-info">
                     <div class="row-seat-date-wrapper">
                     <div class="row-seat">
                        <p><span>ROW:</span> {{ $seat['row'] }}</p>
                        <p><span>SEAT:</span> {{ $seat['seatNumber'] }}</p>
                    </div>
                    <div class="date-time">
                        <p><span>DATE:</span>{{ \Carbon\Carbon::parse($schedule->date)->format('d')}}{{ \Carbon\Carbon::parse($schedule->date)->format('M')}}  </p>
                        <p><span>TIME:</span>{{ \Carbon\Carbon::parse($schedule->time)->format('h:i A')}}</p>
                    </div>
                  </div>
               </div>
                   <div class="barcode" style="align-items: center;">
                    <img height="80" width="400" src="data:image/png;base64,{{ $barcode[$ticket->id] ?? '' }}" alt="Ticket Barcode">
                   </div>
                   <p class="cinema-name">NAME CINEMA</p>
               </td>
               <!-- Ticket Right Section -->
               <td class="ticket-right">
                   <div class="movie-details">
                       <h2>{{ $movie->title }}</h2>
                       <div class="details">
                        <p><span>ROW</span><span> {{ $seat['row'] }}</span></p>
                        <p><span>SEAT</span><span> {{ $seat['seatNumber'] }}</span></p>
                        <p><span>DATE</span><span>{{ \Carbon\Carbon::parse($schedule->date)->format('d')}}{{ \Carbon\Carbon::parse($schedule->date)->format('M')}}  </span></p>
                        <p><span>TIME</span><span>{{ \Carbon\Carbon::parse($schedule->time)->format('h:i A') }} </span></p>    
                        </div>
                   </div>
               </td>
           </tr>
       </table>
   @endforeach
</div>
</body>
</html>

