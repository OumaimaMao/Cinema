<?php

namespace App\Mail;

use Mpdf\Mpdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Contracts\Queue\ShouldQueue;

class ticketEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $movie;
    public $schedule;
    public $selectedSeats;
    public $tickets;
    public $barcode;

    /**
     * Create a new message instance.
     */
    public function __construct($movie, $schedule, $selectedSeats,$tickets, $barcode)
    {
       $this->movie = $movie;
        $this->schedule = $schedule;
        $this->selectedSeats = $selectedSeats;
        $this->tickets = $tickets;
        $this->barcode = $barcode;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Movie Ticket',
        );
    }

    public function build(){
        $html = view('ticketPdf', [
            'movie' => $this->movie,
            'schedule' => $this->schedule,
            'selectedSeats' => $this->selectedSeats,
            'tickets' => $this->tickets,
            'barcode' => $this->barcode,
            
        ])->render();
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $pdfOutput = $mpdf->Output('', 'S');

        return $this->subject('Your Movie Ticket')->view('textEmail')->attachData($pdfOutput, 'ticket.pdf', [
            'mime' => 'application/pdf',
        ]);
    }
    public function attachments(): array{
        
      
        return [];
    }
}
