<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('vendor.adminlte.auth.login');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/Tickets/rHggzTfqae', 'ComplaintsController@rHggzTfqae');
    Route::get('/Tickets/VVvarLnNDb', 'ComplaintsController@VVvarLnNDb');
    Route::get('/Tickets/ajPqZqzAYd', 'ComplaintsController@ajPqZqzAYd');
    Route::get('/Tickets/qPRxTCuQpe', 'ComplaintsController@qPRxTCuQpe');
    Route::get('/Tickets/J5apvq8zq', 'ComplaintsController@J5apvq8zq');

    // Ruta del Desierto
    Route::get('/Tickets/Historico/VVvarLnNDb', 'ComplaintsController@historico_VVvarLnNDb');
    Route::get('/Tickets/Full/VVvarLnNDb', 'ComplaintsController@full_VVvarLnNDb');

    // Ruta del Algarrobo
    Route::get('/Tickets/Historico/J5apvq8zq', 'ComplaintsController@historico_J5apvq8zq');
    Route::get('/Tickets/Full/J5apvq8zq', 'ComplaintsController@full_J5apvq8zq');

    // Valles del Biobio
    Route::get('/Tickets/Historico/rHggzTfqae', 'ComplaintsController@historico_rHggzTfqae');
    Route::get('/Tickets/Full/rHggzTfqae', 'ComplaintsController@full_rHggzTfqae');

    Route::post('/Fichas', 'ComplaintsController@fichas');
    Route::post('/Print', 'ComplaintsController@fic_print');

    Route::post('/Ticket/Responder', 'AnswersController@answers');

    Route::post('/Ticket/Cerrar', 'AnswersController@cerrar');

    Route::get('/Selector', 'ComplaintsController@selector');
    Route::post('/Seleccionado', 'ComplaintsController@seleccionado');

    Route::get('/Configuracion', 'ComplaintsController@configuracion');
    Route::post('/Configuraciones', 'ComplaintsController@configuraciones');
    Route::post('/ActualizaCorreo','ComplaintsController@actualizacorreo');
    Route::post('/CambioClave','ComplaintsController@cambioclave');

});

Route::post('/Enviar', 'ComplaintsController@guardar');

Route::get('/Tickets/VallesBiobio', 'ComplaintsController@VallesBiobio');
Route::get('/Tickets/RdelAlgarrobo', 'ComplaintsController@RdelAlgarrobo');
Route::get('/Tickets/VdelDesierto', 'ComplaintsController@VdelDesierto');
Route::get('/Tickets/RdelLimari', 'ComplaintsController@RdelLimari');
Route::get('/Tickets/RdelDesierto', 'ComplaintsController@RdelDesierto');

