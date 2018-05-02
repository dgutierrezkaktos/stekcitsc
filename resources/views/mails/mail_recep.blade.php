<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Plataforma de Tickets</title>
</head>
<body>
<p>Hola! Hemos recibido un ticket de Soporte. Nº de Ticket: {{ $det_ticket->folio}}</p>
<p>Estos son los datos ingresados vía formulario:</p>
<ul>
    <li>Nombre: {{ $det_ticket->name_person}}</li>
    <li>Dirección: {{ $det_ticket->address}}</li>
    <li>Comuna: {{ $det_ticket->city}}</li>
    <li>Fono: {{ $det_ticket->phone}}</li>

</ul>
<p>Y el detalle del Ticket:</p>
<ul>
    <li>Tipo de Ticket: {{ $det_ticket->type_contact}}</li>
    <li>Tipo Vehículo: {{ $det_ticket->type_vehicle}}</li>
    <li>Patente: {{ $det_ticket->pp_vehicle}}</li>
    <li>Asunto: {{ $det_ticket->subject}}</li>
    <li>Mensaje: {{ $det_ticket->message}}</li>
</ul>
<p>Gracias por escribirnos, responderemos a tu solicitud vía correo electrónico.</p>

<p>
    @if($det_ticket->concession_idconcession == 1)
        <a href="http://www.vallesdelbiobio.cl"></a><b>Concesionaria Valles del Biobío</b></a><br/>
    @elseif($det_ticket->concession_idconcession == 2)
        <a href="http://www.rdeldesierto.cl"></a><b>Concesionaria Rutas del Desierto</b></a><br/>
    @elseif($det_ticket->concession_idconcession == 3)
        <a href="http://www.rdeldesierto.cl"></a><b>Concesionaria Ruta del Limarí</b></a><br/>
    @elseif($det_ticket->concession_idconcession == 4)
        <a href="http://www.rdeldesierto.cl"></a><b>Concesionaria Valles del Desierto</b></a><br/>
    @elseif($det_ticket->concession_idconcession == 5)
        <a href="http://www.rutadelalgarrobo.cl"></a><b>Concesionaria Ruta del Algarrobo</b></a><br/>
    @endif
    <strong>&copy; 2017 Todos los Derechos Reservados.
</p>
</body>
</html>