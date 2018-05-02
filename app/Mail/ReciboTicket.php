<?php

namespace App\Mail;

use App\Http\Controllers\ComplaintsController;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;

class ReciboTicket extends Mailable
{
    use Queueable, SerializesModels;
    public $IDTicket, $det_ticket;

    public function __construct($IDTicket)
    {
        $this->IDTicket = $IDTicket;

        $det_ticket = DB::table('complaints')
            ->where('id_complaints','=', $IDTicket)
            ->first();

        $this->det_ticket = $det_ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mail_recep');
    }
}
