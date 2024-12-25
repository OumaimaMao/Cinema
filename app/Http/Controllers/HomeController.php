<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use Dompdf\Dompdf;
use App\Models\Movie;
use App\Models\Place;
use App\Models\Ticket;
use App\Models\Comming;
use App\Models\Opening;
use App\Models\Category;
use App\Models\Schedule;
use Milon\Barcode\DNS1D;
use App\Mail\ticketEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Picqer\Barcode\BarcodeGeneratorPNG;


class HomeController extends Controller
{
    public function hommeMovie(){
        $slideMovie = Movie::inRandomOrder()->take(4)->get();
        $opening =Opening::with('movie')->paginate(10);
        $comming =Comming::inRandomOrder()->take(5)->get();
        return view('home', ['opening'=> $opening, 'comming'=> $comming, 'slideMovie'=>$slideMovie]);
    }
    public function scheduleMovie($id){
        $movie = Movie::find($id);
        $category = Category::where('id', $movie->idcategory)->first();
        $schedules = $movie->schedules()->orderBy('date')->orderBy('time')->get()->groupBy('date');
        $actor = $movie->actors;
        foreach($schedules as $date => $scheduleGroup){
            foreach($scheduleGroup as $schedule){
                $bookedSeatCount = Ticket::where('idmovie', $id)
                                    ->where('date', $schedule->date)
                                    ->where('time', $schedule->time)
                                    ->count();
                $totalSeats = Place::count();
                $schedule->isFullyBooked = $bookedSeatCount >= $totalSeats;
            }
        }
        return view('schedule',['schedules'=>$schedules, 'movie'=>$movie, 'actor'=>$actor,'category'=>$category]);
    }
    public function place(Request $request, $id, $date, $time){
        $movie = Movie::find($id);
        $schedule = $movie->schedules()->where('date', $date)->where('time', $time)->first();

        $request->session()->put('schedule', $schedule);

        $place = Place::all()->groupBy('row');
        $bookedSeats = Ticket::where('idmovie',$id)->where('date',$date)->where('time',$time)->get();
        return view('place',['schedule'=>$schedule, 'movie'=>$movie, 'place'=>$place, 'bookedSeats' => $bookedSeats]);
    }
    public function payment(Request $request, $id, $date, $time){
        $selectedSeats = json_decode($request->input('selected_seats'), true);
        $request->session()->put('selected_seats',$selectedSeats);
        $places = [];
        foreach($selectedSeats as $seat){
            $place = Place::where('row',$seat['row'])->where('seat', $seat['seatNumber'])->first();
            if ($place) {
                $places[] = $place;
            }
        }
        $movie = Movie::find($id);
        // In the ticket generation function, set the session flag after payment
$request->session()->put('payment_completed', true);
         return view('payment', ['selectedSeats' =>$selectedSeats, 'movie'=>$movie,'places'=>$places]);
    }
    public function ticket(Request $request, $id){
        $selectedSeats = json_decode($request->input('selected_seats'), true) ?? $request->session()->get('selected_seats');


        $schedule= $request->session()->get('schedule');
        $date = $schedule['date'] ?? null;
        $time = $schedule['time'] ?? null;
    
        foreach($selectedSeats as $seat){
            $barcodeValue = Str::random(10);

            $place = Place::where('row',$seat['row'])->where('seat', $seat['seatNumber'])->first();
            $ticket = new Ticket(); 
            $ticket->idmovie = $id;
            $ticket->idplace = $place->id;
            $ticket->ticket_price = $place->price;
            $ticket->date = $date;
            $ticket->time = $time;
            $ticket->barcode = $barcodeValue;
            $ticket->save();
        }
        $movie = Movie::find($id);
        $placeIds =  array_map(function($seat){
            return PLace::where('row', $seat['row'])->where('seat', $seat['seatNumber'])->value('id');}, $selectedSeats);
        $tickets = Ticket::whereIn('idplace', $placeIds)->where('idmovie',$id)->where('date', $date)->where('time', $time)->get();
        return view('ticket', ['selectedSeats' =>$selectedSeats, 'schedule'=>$schedule ,'tickets' => $tickets,'movie'=>$movie]);
    } 

    public function checkPaymentStatus(Request $request)
    {
        $paymentCompleted = $request->session()->has('payment_completed');
            return response()->json(['payment_completed' => $paymentCompleted]);
    }
    
    public function downloadTicket(Request $request, $id, $date, $time){
        $selectedSeats = json_decode($request->input('selected_seats'), true);

        $movie = Movie::find($id);
        $schedule = $movie->schedules()->where('date', $date)->where('time', $time)->first();
        $placeIds =  array_map(function($seat){
            return PLace::where('row', $seat['row'])->where('seat', $seat['seatNumber'])->value('id');}, $selectedSeats);
        $tickets = Ticket::whereIn('idplace', $placeIds)->where('idmovie',$id)->get();
        //Barcode
        $generator = new BarcodeGeneratorPNG();
        $barcode = [];
        foreach ($tickets as $ticket) {
        $barcode[$ticket->id] = base64_encode($generator->getBarcode($ticket->barcode, $generator::TYPE_CODE_128));
        }
            //MPDF(Working)
        $html = view('ticketPdf', compact('movie', 'schedule', 'selectedSeats','tickets','barcode'))->render();
        $mpdf = new Mpdf([
            'format' => 'A4',
            'orientation' => 'L'
        ]);
        $mpdf->WriteHTML($html);
        return $mpdf->Output('ticket.pdf', 'D');
    }
    //Send Email
    public function sendEmail(Request $request,$id, $date, $time){
        $request->validate(['email' => 'required|email']);
        $selectedSeats = json_decode($request->input('selected_seats'), true);

        $request->session()->put('selected_seats', $selectedSeats);

        $movie = Movie::find($id);
        $schedule = $movie->schedules()->where('date', $date)->where('time', $time)->first();
        $placeIds =  array_map(function($seat){
            return PLace::where('row', $seat['row'])->where('seat', $seat['seatNumber'])->value('id');}, $selectedSeats);
        $tickets = Ticket::whereIn('idplace', $placeIds)->where('idmovie',$id)->get();
         //Barcode
         $generator = new BarcodeGeneratorPNG();
         $barcode = [];
         foreach ($tickets as $ticket) {
         $barcode[$ticket->id] = base64_encode($generator->getBarcode($ticket->barcode, $generator::TYPE_CODE_128));
         }

        Mail::to($request->email)->send(new ticketEmail($movie, $schedule, $selectedSeats, $tickets, $barcode));
        $request->session()->put('selected_seats', $selectedSeats);

        return redirect()->back()->with('success','Your ticket has been sent successfully !');
    }

    public function paymentProcess(Request $request){
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        try{
            $charge = \Stripe\Charge::create([
                'amount' => $request->amount,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'OrderPayment',
            ]);
            return back()->with('success', 'Payment Successful!');
        }catch(\Exception $e){
            return back()->with('error', 'Payment Failed! ' . $e->getMessage());
        }
    }
    public function movie(Request $request){
        $slideMovie = Movie::inRandomOrder()->take(4)->get();
        $movie = Movie::paginate(10);
        $category = Category::all();
        $date = Schedule::orderBy('date')->get()->groupBy('date');
        return view('movie',compact('movie','slideMovie','category','date'));
    }
   public function search(Request $request){
        $movieName = $request->get('movieName');
        $filterDate = $request->get('date');
        $filterCategory = $request->get('category');

        $movie = Movie::query();
        if($movieName){
            $movie = Movie::where('title', 'LIKE', "%{$movieName}%");
        }
        if($filterCategory){
            $movie = $movie->where('idcategory', $filterCategory);
        }
        if($filterDate){
            $movieIds = Schedule::where('date',$filterDate)->pluck('idmovie');
            $movie = $movie->whereIn('id', $movieIds);
        }
        $movie = $movie->paginate(10);
        return response()->json([
            'data' => $movie->items(),
            'links' => $movie->links()->render()
        ]); 
    }
}
