<?php

namespace App\Http\Controllers;

use Mail;
use App\Answers;
use App\Mail\ReciboTicket;
use Illuminate\Database\Eloquent\Model;
use App\Complaint as Complaint;
use Illuminate\Http\Request;


use Carbon;
use App\Access;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use DB;

class ComplaintsController extends Controller
{

    public function index()
    {
        $ac = Access::getAccesos();
        return view('home', ['access' => $ac]);
    }

    public function fichas()
    {
        $id_complaints = $_POST['id_comp'];

        $ac = Access::getAccesos();
        $complaints = Complaint::join('concession', 'idconcession', '=', 'concession_idconcession')
            ->where('id_complaints', $id_complaints)
            ->first();

        $answers = DB::table('answers')
            ->where('complaints_id_complaints', '=', $id_complaints)
            ->get();

        $count_ans = DB::table('answers')
            ->where('complaints_id_complaints', '=', $id_complaints)
            ->count();

        return view('Fichas.index', ['access' => $ac, 'fc' => $complaints, 'aw' => $answers, 'aw2' => $count_ans]);
    }

    public function fic_print()
    {
        $id_complaints = $_POST['id_comp'];

        $ac = Access::getAccesos();
        $complaints = Complaint::join('concession', 'idconcession', '=', 'concession_idconcession')
            ->where('id_complaints', $id_complaints)
            ->first();

        $answers = DB::table('answers')
            ->where('complaints_id_complaints', '=', $id_complaints)
            ->get();


        return view('Fichas.print', ['access' => $ac, 'fc' => $complaints, 'aw' => $answers]);
    }

    public function guardar()
    {
        try {

            $var1 = $_POST['optionsRadios'];
            $var2 = $_POST['rut'];
            $var3 = $_POST['nombre'];
            $var4 = $_POST['direccion'];
            $var5 = $_POST['comuna'];
            $var6 = $_POST['correo'];
            $var7 = $_POST['telefono'];
            $var8 = $_POST['tipo_v'];
            $var9 = $_POST['patente'];
            $var10 = $_POST['asunto'];
            $var11 = $_POST['mensaje'];
            $var12 = 1;
            $var13 = $_POST['concession'];

            $folio = DB::table('complaints')
                ->where('concession_idconcession', '=', $var13)
                ->max('folio');

            $folio = $folio + 1;

            $IDTicket = DB::table('complaints')->insertgetID([
                'folio' => $folio,
                'created_at' => date('Y-m-d H:i:s'),
                'type_contact' => $var1,
                'rut_person' => $var2,
                'name_person' => $var3,
                'address' => $var4,
                'city' => $var5,
                'email' => $var6,
                'phone' => $var7,
                'type_vehicle' => $var8,
                'pp_vehicle' => $var9,
                'subject' => $var10,
                'message' => $var11,
                'state' => $var12,
                'ip' => \Request::getClientIp(true),
                'concession_idconcession' => $var13,
            ]);

            $correos = DB::table('config')
                ->where('concesionaria',$var13)
                ->get();

            if ($var13 == '1') {
                Mail::to($var6)
                    ->send(new ReciboTicket($IDTicket));

            } elseif ($var13 == '2') {
                Mail::to($var6)
                    ->send(new ReciboTicket($IDTicket));

            } elseif ($var13 == '5') {
                Mail::to($var6)
                    ->cc($correos[0]->correo)
                    ->bcc($correos[0]->correo2)
                    ->send(new ReciboTicket($IDTicket));
            }

            return back()->with('status', 'Su requerimiento ha sido enviado a la Plataforma de Tickets!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return back()->with('error', 'Ha habido un error en el envio, favor intente mas tarde!');
        }


    }

    public function VallesBiobio()
    {
        return view('VallesBiobio.form');
    }

    public function RdelDesierto()
    {

        return view('RdelDesierto.form');
    }

    public function RdelLimari()
    {
        return view('RdelLimari.form');
    }

    public function VdelDesierto()
    {
        return view('VdelDesierto.form');
    }

    public function RdelAlgarrobo()
    {
        return view('RdelAlgarrobo.form');
    }


    public function rHggzTfqae()
    {

        $ac = Access::getAccesos();
        $complaints = Complaint::where('concession_idconcession', '1')
            ->where('state', '=', '1')
            ->get();

        $reclamos = Complaint::where('type_contact', 'Reclamo')
            ->where('concession_idconcession', '1')
            ->where('state', '=', '1')
            ->count();

        $info = Complaint::where('type_contact', 'Solicitud Información')
            ->where('concession_idconcession', '1')
            ->where('state', '=', '1')
            ->count();

        $sugerencia = Complaint::where('type_contact', 'Sugerencia')
            ->where('concession_idconcession', '1')
            ->where('state', '=', '1')
            ->count();

        $felicitaciones = Complaint::where('type_contact', 'Felicitaciones')
            ->where('concession_idconcession', '1')
            ->where('state', '=', '1')
            ->count();

        return view('VallesBiobio.index', [
            'complaints' => $complaints,
            'access' => $ac,
            'reclamos' => $reclamos,
            'info' => $info,
            'sugerencia' => $sugerencia,
            'felicitaciones' => $felicitaciones
        ]);

    }

    public function VVvarLnNDb()
    {
        $ac = Access::getAccesos();
        $complaints = Complaint::where('concession_idconcession', '2')
            ->where('state', '=', '1')
            ->get();

        $reclamos = Complaint::where('type_contact', 'Reclamo')
            ->where('concession_idconcession', '2')
            ->where('state', '=', '1')
            ->count();

        $info = Complaint::where('type_contact', 'Solicitud Información')
            ->where('concession_idconcession', '2')
            ->where('state', '=', '1')
            ->count();

        $sugerencia = Complaint::where('type_contact', 'Sugerencia')
            ->where('concession_idconcession', '2')
            ->where('state', '=', '1')
            ->count();

        $felicitaciones = Complaint::where('type_contact', 'Felicitaciones')
            ->where('concession_idconcession', '2')
            ->where('state', '=', '1')
            ->count();

        return view('RdelDesierto.index', [
            'complaints' => $complaints,
            'access' => $ac,
            'reclamos' => $reclamos,
            'info' => $info,
            'sugerencia' => $sugerencia,
            'felicitaciones' => $felicitaciones
        ]);
    }

    public function ajPqZqzAYd()
    {
        $ac = Access::getAccesos();
        $complaints = Complaint::where('concession_idconcession', '3')->get();

        return view('RdelLimari.index', [
            'complaints' => $complaints,
            'access' => $ac
        ]);
    }

    public function qPRxTCuQpe()
    {
        $ac = Access::getAccesos();
        $complaints = Complaint::where('concession_idconcession', '4')->get();

        return view('VdelDesierto.index', [
            'complaints' => $complaints,
            'access' => $ac
        ]);
    }

    public function J5apvq8zq()
    {
        $ac = Access::getAccesos();
        $complaints = Complaint::where('concession_idconcession', '5')
            ->where('state', '=', '1')
            ->get();

        $reclamos = Complaint::where('type_contact', 'Reclamo')
            ->where('concession_idconcession', '5')
            ->where('state', '=', '1')
            ->count();

        $info = Complaint::where('type_contact', 'Solicitud Información')
            ->where('concession_idconcession', '5')
            ->where('state', '=', '1')
            ->count();

        $sugerencia = Complaint::where('type_contact', 'Sugerencia')
            ->where('concession_idconcession', '5')
            ->where('state', '=', '1')
            ->count();

        $felicitaciones = Complaint::where('type_contact', 'Felicitaciones')
            ->where('concession_idconcession', '5')
            ->where('state', '=', '1')
            ->count();

        return view('RdelAlgarrobo.index', [
            'complaints' => $complaints,
            'access' => $ac,
            'reclamos' => $reclamos,
            'info' => $info,
            'sugerencia' => $sugerencia,
            'felicitaciones' => $felicitaciones
        ]);
    }

    public function historico_J5apvq8zq()
    {
        $ac = Access::getAccesos();
        $complaints = Complaint::where('concession_idconcession', '5')
            ->where('state', '=', '2')
            ->get();

        $reclamos = Complaint::where('type_contact', 'Reclamo')
            ->where('concession_idconcession', '5')
            ->where('state', '=', '2')
            ->count();

        $info = Complaint::where('type_contact', 'Solicitud Información')
            ->where('concession_idconcession', '5')
            ->where('state', '=', '2')
            ->count();

        $sugerencia = Complaint::where('type_contact', 'Sugerencia')
            ->where('concession_idconcession', '5')
            ->where('state', '=', '2')
            ->count();

        $felicitaciones = Complaint::where('type_contact', 'Felicitaciones')
            ->where('concession_idconcession', '5')
            ->where('state', '=', '2')
            ->count();

        return view('RdelAlgarrobo.historico', [
            'complaints' => $complaints,
            'access' => $ac,
            'reclamos' => $reclamos,
            'info' => $info,
            'sugerencia' => $sugerencia,
            'felicitaciones' => $felicitaciones
        ]);
    }

    public function full_J5apvq8zq()
    {
        $ac = Access::getAccesos();
        $complaints = Complaint::where('concession_idconcession', '5')
            ->get();

        $reclamos = Complaint::where('type_contact', 'Reclamo')
            ->where('concession_idconcession', '5')
            ->count();

        $info = Complaint::where('type_contact', 'Solicitud Información')
            ->where('concession_idconcession', '5')
            ->count();

        $sugerencia = Complaint::where('type_contact', 'Sugerencia')
            ->where('concession_idconcession', '5')
            ->count();

        $felicitaciones = Complaint::where('type_contact', 'Felicitaciones')
            ->where('concession_idconcession', '5')
            ->count();

        return view('RdelAlgarrobo.full', [
            'complaints' => $complaints,
            'access' => $ac,
            'reclamos' => $reclamos,
            'info' => $info,
            'sugerencia' => $sugerencia,
            'felicitaciones' => $felicitaciones
        ]);
    }

    public function historico_VVvarLnNDb()
    {
        $ac = Access::getAccesos();
        $complaints = Complaint::where('concession_idconcession', '2')
            ->where('state', '=', '2')
            ->get();

        $reclamos = Complaint::where('type_contact', 'Reclamo')
            ->where('concession_idconcession', '2')
            ->where('state', '=', '2')
            ->count();

        $info = Complaint::where('type_contact', 'Solicitud Información')
            ->where('concession_idconcession', '2')
            ->where('state', '=', '2')
            ->count();

        $sugerencia = Complaint::where('type_contact', 'Sugerencia')
            ->where('concession_idconcession', '2')
            ->where('state', '=', '2')
            ->count();

        $felicitaciones = Complaint::where('type_contact', 'Felicitaciones')
            ->where('concession_idconcession', '2')
            ->where('state', '=', '2')
            ->count();

        return view('RdelDesierto.historico', [
            'complaints' => $complaints,
            'access' => $ac,
            'reclamos' => $reclamos,
            'info' => $info,
            'sugerencia' => $sugerencia,
            'felicitaciones' => $felicitaciones
        ]);
    }

    public function full_VVvarLnNDb()
    {
        $ac = Access::getAccesos();
        $complaints = Complaint::where('concession_idconcession', '2')
            ->get();

        $reclamos = Complaint::where('type_contact', 'Reclamo')
            ->where('concession_idconcession', '2')
            ->count();

        $info = Complaint::where('type_contact', 'Solicitud Información')
            ->where('concession_idconcession', '2')
            ->count();

        $sugerencia = Complaint::where('type_contact', 'Sugerencia')
            ->where('concession_idconcession', '2')
            ->count();

        $felicitaciones = Complaint::where('type_contact', 'Felicitaciones')
            ->where('concession_idconcession', '2')
            ->count();

        return view('RdelDesierto.full', [
            'complaints' => $complaints,
            'access' => $ac,
            'reclamos' => $reclamos,
            'info' => $info,
            'sugerencia' => $sugerencia,
            'felicitaciones' => $felicitaciones
        ]);
    }

    public function historico_rHggzTfqae()
    {
        $ac = Access::getAccesos();
        $complaints = Complaint::where('concession_idconcession', '1')
            ->where('state', '=', '2')
            ->get();

        $reclamos = Complaint::where('type_contact', 'Reclamo')
            ->where('concession_idconcession', '1')
            ->where('state', '=', '2')
            ->count();

        $info = Complaint::where('type_contact', 'Solicitud Información')
            ->where('concession_idconcession', '1')
            ->where('state', '=', '2')
            ->count();

        $sugerencia = Complaint::where('type_contact', 'Sugerencia')
            ->where('concession_idconcession', '1')
            ->where('state', '=', '2')
            ->count();

        $felicitaciones = Complaint::where('type_contact', 'Felicitaciones')
            ->where('concession_idconcession', '1')
            ->where('state', '=', '2')
            ->count();

        return view('VallesBiobio.historico', [
            'complaints' => $complaints,
            'access' => $ac,
            'reclamos' => $reclamos,
            'info' => $info,
            'sugerencia' => $sugerencia,
            'felicitaciones' => $felicitaciones
        ]);
    }

    public function full_rHggzTfqae()
    {
        $ac = Access::getAccesos();
        $complaints = Complaint::where('concession_idconcession', '1')
            ->get();

        $reclamos = Complaint::where('type_contact', 'Reclamo')
            ->where('concession_idconcession', '1')
            ->count();

        $info = Complaint::where('type_contact', 'Solicitud Información')
            ->where('concession_idconcession', '1')
            ->count();

        $sugerencia = Complaint::where('type_contact', 'Sugerencia')
            ->where('concession_idconcession', '1')
            ->count();

        $felicitaciones = Complaint::where('type_contact', 'Felicitaciones')
            ->where('concession_idconcession', '1')
            ->count();

        return view('VallesBiobio.full', [
            'complaints' => $complaints,
            'access' => $ac,
            'reclamos' => $reclamos,
            'info' => $info,
            'sugerencia' => $sugerencia,
            'felicitaciones' => $felicitaciones
        ]);
    }

    public function selector()
    {

        $ac = Access::getAccesos();

        return view('Selector.selector',
            [
                'access' => $ac,
            ]);
    }

    public function seleccionado()
    {

        $ac = Access::getAccesos();
        $conce = $_POST['concesion'];
        $accion = $_POST['accion'];
        $annio = $_POST['annio'];

        $complaints = Complaint::where('concession_idconcession', $conce)
            ->where('state', '2')
            ->get();

        $annio_b = Complaint::where('concession_idconcession', $conce)
            ->where('created_at', 'like', $annio . '-%')
            ->where('state', '2')
            ->get();

        // Ver Tickets Abiertos
        if ($accion == 1) {
            if ($conce == 5) {
                return $this->J5apvq8zq();
            } elseif ($conce == 2) {
                return $this->VVvarLnNDb();
            }
        } elseif ($accion == 2) {

            $mes = $_POST['mes'];

            if ($mes == 01) {
                $mes_palabras = 'Enero';
            } elseif ($mes == '02') {
                $mes_palabras = 'Febrero';
            } elseif ($mes == '03') {
                $mes_palabras = 'Marzo';
            } elseif ($mes == '04') {
                $mes_palabras = 'Abril';
            } elseif ($mes == '05') {
                $mes_palabras = 'Mayo';
            } elseif ($mes == '06') {
                $mes_palabras = 'Junio';
            } elseif ($mes == '07') {
                $mes_palabras = 'Julio';
            } elseif ($mes == '08') {
                $mes_palabras = 'Agosto';
            } elseif ($mes == '09') {
                $mes_palabras = 'Septiembre';
            } elseif ($mes == '10') {
                $mes_palabras = 'Octubre';
            } elseif ($mes == '11') {
                $mes_palabras = 'Noviembre';
            } elseif ($mes == '12') {
                $mes_palabras = 'Diciembre';
            }

            $mes_b = Complaint::where('concession_idconcession', $conce)
                ->where('created_at', 'like', $annio . '-' . $mes . '%')
                ->where('state', '2')
                ->get();

            return view('Selector.historico_mensual', [
                'access' => $ac,
                'complaints' => $complaints,
                'mes_b' => $mes_b,
                'mes' => $mes_palabras,
                'annio' => $annio
            ]);
        } elseif ($accion == 3) {
            return view('Selector.historico_anual', [
                'access' => $ac,
                'complaints' => $complaints,
                'annio_b' => $annio_b,
                'annio' => $annio
            ]);
        }

    }

    public function configuracion()
    {

        $ac = Access::getAccesos();

        return view('Configuraciones.selector',
            [
                'access' => $ac,
            ]);

    }

    public function configuraciones()
    {

        $id_conc = $_POST['concesion'];


        $info_conce = DB::table('config')
            ->where('concesionaria', $id_conc)
            ->first();

        $ac = Access::getAccesos();

        return view('Configuraciones.configuraciones',
            [
                'access' => $ac,
                'datos' => $info_conce
            ]);

    }

    public function actualizacorreo()
    {

        $correo = $_POST['correo'];
        $correo2 = $_POST['correo2'];
        $id_conc = $_POST['conce'];

        DB::table('config')
            ->where('concesionaria', $id_conc)
            ->update([
                'correo' => $correo,
                'correo2' => $correo2
            ]);

        return $this->configuracion();

    }

    public function cambioclave()
    {


        $user = $_POST['id_usuario'];
        $clave_act = $_POST['clave'];
        $clave_nueva = $_POST['clave_nueva'];

        $ver_clave = DB::table('users')
            ->where('id', $user)
            ->select('password')
            ->first();

        if ($ver_clave == bcrypt($clave_act)) {
            DB::table('users')
                ->where('id', $user)
                ->update([
                    'password' => bcrypt($clave_nueva)
                ]);

            return $this->configuracion()->with('status', 'Clave cambiada correctamente');
        }else{

            print_r("error");
            die();
            return $this->configuracion()->with('error', 'Clave c');
        }
    }

}
