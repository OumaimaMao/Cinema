<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class ,'hommeMovie'])->name('home');

Route::get('/sch/{id}', [HomeController::class ,'scheduleMovie']);
Route::get('/place/{id}/{date}/{time}', [HomeController::class ,'place']);
//Route::match(['get','post'], '/ticket/{id}/{date}/{time}', [HomeController::class ,'ticket'])->name('ticket');
Route::get('/ticket/{id}', [HomeController::class ,'ticket'])->name('ticket');
//Ticket Pdf
Route::get('/ticketPdf/{id}/{date}/{time}',[HomeController::class ,'downloadTicket'])->name('ticket.download');
//Send Email
Route::post('/sendTicket/{id}/{date}/{time}',[HomeController::class ,'sendEmail'])->name('sendTicket');
//Payment
Route::match(['get','post'],'/payment/{id}/{date}/{time}', [HomeController::class ,'payment'])->name('payment');
//Route::get('/payment', [HomeController::class ,'payment']);
Route::post('/payment', [HomeController::class, 'paymentProcess'])->name('payment.process');
//movie
Route::get('/movie', [HomeController::class ,'movie']);
Route::match(['get','post'], '/search', [HomeController::class ,'search'])->name('search');

//check
Route::get('/check-payment-status', [HomeController::class, 'checkPaymentStatus'])->name('check.payment.status');


Route::get('/place', function () {
    return view('place');
});
Route::get('/ticket', function () {
    return view('ticket');
});

