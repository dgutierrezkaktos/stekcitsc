<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Access extends Model
{
    protected $table = 'access';

    public static function getAccesos(){

        $mis_rutas = DB::table('access')
            ->join('concession', 'concession_idconcession', '=', 'idconcession')
            ->where('users_id','=', Auth::id())
            ->get();

        return $mis_rutas;
    }
}


