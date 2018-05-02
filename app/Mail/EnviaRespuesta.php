<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;

class EnviaRespuesta extends Mailable
{
    use Queueable, SerializesModels;

    public $id_ans, $det_resp, $det_tic;

    public function __construct($id_ans, $id_tic)
    {
        $this->IDAns = $id_ans;

        $det_resp= DB::table('answers')
            ->where('id_answers','=', $id_ans)
            ->first();

        $det_tic = DB::table('complaints')
            ->where('id_complaints', '=', $id_tic)
            ->first();

        $this->det_tic = $det_tic;
        $this->det_resp = $det_resp;
    }

    public function build()
    {
        return $this->view('mails.mail_resp');
    }
}
