<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Plataforma de Tickets</title>
</head>
<body>
<p>Hola! Traemos la respuesta a su solicitud de Ticket</p>
<p>Info Ticket:</p>
<ul>
    <li>Tipo de Ticket: {{ $det_tic->type_contact}}</li>
    <li>Tipo Vehículo: {{ $det_tic->type_vehicle}}</li>
    <li>Patente: {{ $det_tic->pp_vehicle}}</li>
    <li>Asunto: {{ $det_tic->subject}}</li>
    <li>Mensaje: {{ $det_tic->message}}</li>
</ul>
<p>Respuesta:</p>
<ul>
    <li>
        {{ $det_resp->answers}}
    </li>
</ul>
<p>Gracias por escribirnos, responderemos a tu solicitud vía correo electrónico.</p>

<p>
    @if($det_tic->concession_idconcession == 1)
        <a href="http://www.vallesdelbiobio.cl"></a><b>Concesionaria Valles del Biobío</b></a><br/>
    @elseif($det_tic->concession_idconcession == 2)
        <a href="http://www.rdeldesierto.cl"></a><b>Concesionaria Rutas del Desierto</b></a><br/>
    @elseif($det_tic->concession_idconcession == 3)
        <a href="http://www.rdeldesierto.cl"></a><b>Concesionaria Ruta del Limarí</b></a><br/>
    @elseif($det_tic->concession_idconcession == 4)
        <a href="http://www.rdeldesierto.cl"></a><b>Concesionaria Valles del Desierto</b></a><br/>
    @elseif($det_tic->concession_idconcession == 5)
        <a href="http://www.rutadelalgarrobo.cl"></a><b>Concesionaria Ruta del Algarrobo</b></a><br/>
    @endif
    <strong>&copy; 2018<a href="http://www.rdeldesierto.cl"> Todos los Derechos Reservados</a>.
</p>
</body>
</html>