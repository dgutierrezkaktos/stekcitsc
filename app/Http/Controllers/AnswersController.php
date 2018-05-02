<?php

namespace App\Http\Controllers;

use App\Mail\EnviaRespuesta;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;

class AnswersController extends Controller
{

    public function index()
    {

    }

    public function cerrar()
    {
        try {
            $id = $_POST['id_cons'];
            $by = $_POST['close_by'];
            $obs = $_POST['obs'];

            DB::table('complaints')
                ->where('id_complaints', $id)
                ->update([
                    'state' => 2,
                    'closed_by' => $by,
                    'closed_obs' => $obs
                ]);

            return redirect('/home')->with('status', '¡Ticket Cerrado!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('/home')->with('error', '¡Error, No se pudo cerrar el ticket!');
        }
    }

    public function answers()
    {
        try {
            $id = $_POST['id_cons'];
            $cc = $_POST['cc'];
            $cco = $_POST['cco'];
            $mensaje = $_POST['mensaje'];
            $id_conce = $_POST['id_conce'];

            $mail_to = DB::table('complaints')
                ->where('id_complaints', '=', $id)
                ->select('email')
                ->first();

            $id_ans = DB::table('answers')->insertGetId(
                [
                    'created_at' => date('Y-m-d H:i:s'),
                    'answers' => $mensaje,
                    'cc' => $cc,
                    'cco' => $cco,
                    'complaints_id_complaints' => $id,
                ]);


            $correos = DB::table('config')
                ->where('concesionaria',$id_conce)
                ->get();

            if ($id_conce == '1') {
                Mail::to($mail_to)
                    ->send(new EnviaRespuesta($id_ans, $id));

            } elseif ($id_conce == '2') {
                Mail::to($mail_to)
                    ->send(new EnviaRespuesta($id_ans, $id));

            } elseif ($id_conce == '5') {
                Mail::to($mail_to->email)
                    ->cc($correos[0]->correo)
                    ->bcc($correos[0]->correo2)
                    ->send(new EnviaRespuesta($id_ans, $id));
            }

            return redirect('/home')->with('status', 'Respuesta ENVIADA!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('/home')->with('error', 'ERROR, NO SE PUDO ENVIAR RESPUESTA!');

        }

    }


}
