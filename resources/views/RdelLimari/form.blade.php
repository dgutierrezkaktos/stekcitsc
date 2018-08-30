<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }} ">
    <meta name="author" content="Sergi Tur Badenas - acacha.org">

    <meta property="og:title" content="Adminlte-laravel"/>
    <meta property="og:type" content="website"/>
    <meta property="og:description"
          content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }}"/>
    <meta property="og:url" content="http://demo.adminlte.acacha.org/"/>
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png"/>
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png"/>
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png"/>
    <meta property="og:sitename" content="demo.adminlte.acacha.org"/>
    <meta property="og:url" content="http://demo.adminlte.acacha.org"/>


    <title>Ruta del Limarí - Tickets</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet'
          type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

    <style type="text/css">
        .navbar {
            position: relative;
            min-height: 100px;
            margin-bottom: 0px;
    </style>

</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<!-- Fixed navbar -->
<div id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img
                        src="http://www.rutadellimari.cl/wp-content/uploads/2016/04/logo_limari.png" width="200"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Administración</a></li>
                @else
                    <li><a href="/home">{{ Auth::user()->name }}</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>


<section id="desc" name="desc"></section>
<!-- INTRO WRAP -->
<div id="intro">
    <div class="container">
        <div class="row">
            <h1>Sistema de Reclamos Sugerencias y Consultas</h1>
            <h3>Concesión Ruta del Limarí</h3>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <br>
            <div class="col-lg-8">
                <form class="form-horizontal" name="form" action="{{ url('/Enviar') }}" role="form" method="POST">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="Reclamo"
                                                   checked>
                                            Reclamo
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2"
                                                   value="Solicitud Información">
                                            Solicitud de Información
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios3"
                                                   value="Sugerencia">
                                            Sugerencia
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios3"
                                                   value="Felicitaciones">
                                            Felicitaciones
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>RUT / DNI: </label>
                                    <input class="form-control" type="text" name="rut" placeholder="XX.XXX.XXX-X"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label>NOMBRE: </label>
                                    <input class="form-control" type="text" name="nombre" placeholder="Nombre Completo"
                                           required>
                                </div>

                                <div class="form-group">
                                    <label>DIRECCIÓN: </label>
                                    <input class="form-control" type="text" name="direccion"
                                           placeholder="Calle y Número">
                                </div>

                                <div class="form-group">
                                    <label>COMUNA: </label>
                                    <input class="form-control" type="text" name="comuna" placeholder="Comuna y/o País">
                                </div>

                                <div class="form-group">
                                    <label>CORREO ELECTRÓNICO: </label>
                                    <input class="form-control" type="email" name="correo"
                                           placeholder="correo@correoelectronico.cl" required>
                                </div>

                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>TELÉFONO: </label>
                                    <input class="form-control" type="number" name="telefono"
                                           placeholder="Cod. Área y Número" required>
                                </div>

                                <div class="form-group">
                                    <label>TIPO VEHÍCULO: </label>
                                    <input class="form-control" type="text" name="tipo_v"
                                           placeholder="Auto, Camioneta, Furgón, Etc.">
                                </div>

                                <div class="form-group">
                                    <label>PATENTE: </label>
                                    <input class="form-control" type="text" name="patente" placeholder="XXXX-XX">
                                </div>

                                <div class="form-group">
                                    <label>ASUNTO: </label>
                                    <input class="form-control" type="text" name="asunto"
                                           placeholder="Asunto del Contacto" required>
                                </div>

                                <div class="form-group">
                                    <label>MENSAJE: </label>
                                    <textarea class="form-control" rows="4" name="mensaje"
                                              placeholder="Mensaje del Usuario..." required></textarea>
                                </div>

                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default">Borrar Formulario</button>
                                    <button type="submit" class="btn btn-primary pull-right">Enviar Solicitud</button>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="concession" value="3">
                </form>


            </div>
        </div>
    </div>
</div>

<div class="col-lg-4">
    <p>
    <H5>Fono Emergencias: </H5>
    <h3><label for="tel">51 267 4990</label></h3>

    <hr>

    <h5>Correo Electrónico: </h5>
    <h3><label for="email">-</label></h3>

    <hr>

    <h5>Sitio Web: </h5>
    <h3><label>www.rutadellimari.cl</label></h3>

    <hr>

    <h5>Redes Sociales: </h5>
    <a href=""><img src="http://www.corporativo.bancoestado.cl/images/default-source/logos/logo-fb.png?sfvrsn=0"></a>
    <a href=""><img src="http://www.corporativo.bancoestado.cl/images/default-source/logos/logo-tw.png?sfvrsn=0"></a>

    </p>
</div>
</div>
<br>
<hr>
</div> <!--/ .container -->
</div><!--/ #introwrap -->
</div>

<div id="c">
    <div class="container">
        <p>
            <a href="http://www.rdeldesierto.cl"></a><b>Concesionaria Rutas del Desierto</b></a><br/>
            <strong>&copy; 2018<a href="http://www.rdeldesierto.cl"> Todos los Derechos Reservados</a>.</strong>
            <br>
            <small>Desarrollado por <a href="http://www.danielgutierrez.cl">Daniel Gutiérrez F.</a>.</small>
        </p>

    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>