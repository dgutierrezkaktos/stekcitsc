@extends('adminlte::layouts.print')


<body onload="window.print();">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->
        <div class="row">

            <div class="col-xs-12">
                <?php
                if($fc->concession_idconcession == '5'){
                ?><img src="http://rutadelalgarrobo.cl/wp-content/uploads/2016/04/ruta_algarrobo-baja-132x70.png"
                       alt="" width="140"><?php
                }elseif($fc->concession_idconcession == '2'){
                ?><img src="http://rdeldesierto.cl/wp-content/uploads/2018/04/cropped-logo_desierto-374x140.png"
                       alt="" width="140"><?php
                }
                ?>
            </div>

            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-pencil"></i> Formulario de Sugerencias, Reclamos y Felicitaciones
                </h2>
                <h3 align="right">Folio: {{  $fc -> folio }}</h3>
                <small class="pull-right"><small>Fecha / Hora Ingreso: {{  date("d/M/Y - H:i:s", strtotime($fc -> created_at)) }}</small></small>
            </div>


            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row">
            <!-- /.col -->
            <div class="col-xs-4">
                <strong>ANTECEDENTES:</strong>
                <table class="table">
                    <tr>
                        <td><b><small>Tipo de Ticket</small></b></td>
                        <td>:</td>
                        <td><small>{{  $fc -> type_contact }}</small></td>
                    </tr>
                    <tr>
                        <td><b><small>Estado Ticket</small></b></td>
                        <td>:</td>
                        <td>@if( $fc -> state == 1)
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip"
                                        title="Abierto">
                                    <i class="fa fa-times"></i> No Resuelto
                                </button>
                            @elseif($fc->state ==2)
                                <button type="button" class="btn btn-success btn-xs" data-toggle="tooltip"
                                        title="Cerrado">
                                    <i class="fa fa-check"></i> Resuelto y Cerrado
                                </button>
                            @else
                                <button type="button" class="btn btn-warning btn-xs" data-toggle="tooltip"
                                        title="Con Observaciones">
                                    <i class="fa fa-info"></i> Con Observaciones
                                </button>
                            @endif</td>
                    </tr>
                    <tr>
                        <td><b><small>IP Solicitud</small></b></td>
                        <td>:</td>
                        <td><small>{{  $fc -> ip }}</small></td>
                    </tr>
                    <tr>
                        <td><b><small>Fecha Respuesta:</small></b></td>
                        <td>:</td>
                        <td><small>@foreach($aw as $c)
                                    {{ $c -> created_at }}
                                @endforeach
                            </small></td>
                    </tr>
                </table>

            </div>
            <!-- /.col -->
            <div class="col-xs-8">
                <strong>DATOS PERSONALES:</strong>
                <table class="table table-striped">
                    <tr>
                        <td><b><small>Rut</small></b></td>
                        <td>:</td>
                        <td><small>{{  $fc -> rut_person }}</small></td>
                    </tr>
                    <tr>
                        <td><b><small>Nombre</small></b></td>
                        <td>:</td>
                        <td><small>{{  $fc -> name_person }}</small></td>
                    </tr>
                    <tr>
                        <td><b><small>Dirección</small></b></td>
                        <td>:</td>
                        <td><small>{{  $fc -> address }}, {{$fc -> city}}</small></td>
                    </tr>
                    <tr>
                        <td><b><small>Teléfono</small></b></td>
                        <td>:</td>
                        <td><small>{{  $fc -> phone }}</small></td>
                    </tr>
                    <tr>
                        <td><b><small>E-Mail</small></b></td>
                        <td>:</td>
                        <td><small>{{  $fc -> email }}</small></td>
                    </tr>
                    <tr>
                        <td><b><small>Asunto</small></b></td>
                        <td>:</td>
                        <td><small>{{  $fc -> subject }}</small></td>
                    </tr>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <!-- accepted payments column -->

            <div class="col-xs-12">
                <p class="lead"><i class="fa fa-edit"></i> <b>MENSAJE DEL USUARIO:</b></p>

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    <small>{{  $fc -> message }}</small>
                </p>
            </div>

        </div>
        <div class="row">
            <!-- accepted payments column -->

            <div class="col-xs-12">
                <p class="lead"><i class="fa fa-edit"></i> <b>RESPUESTA SOCIEDAD CONCESIONARIA:</b></p>

                <?php
                foreach ($aw as $c){ ?>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    <small>{{ $c->answers }}</small>
                </p>
                <?php } ?>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <p class="lead"><i class="fa fa-car"></i> <b>DATOS DEL VEHÍCULO:</b>
                </p>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Tipo</th>
                        <th>Placa Patente</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><small>1</small></td>
                        <td><small>{{  $fc -> type_vehicle }}</small></td>
                        <td><small>{{  $fc -> pp_vehicle }}</small></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
