@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Ficha del Ticket
@endsection

@section('contentheader_title')
    FICHA DEL TICKET
@endsection

@section('main-content')

    <section class="invoice">
        <form>

            <input type="button" class="btn btn-app btn" Volver value="<" name="volver atrás2"
                   onclick="history.back()"/>
        </form>
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-road"></i> RUTA: {{  $fc -> name }}
                    <small class="pull-right">Fecha / Hora Ingreso: {{  date("d/M/Y - H:i:s", strtotime($fc -> created_at)) }}</small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-2 invoice-col">
                <?php
                if($fc->concession_idconcession == '5'){
                ?><img src="http://rutadelalgarrobo.cl/wp-content/uploads/2016/04/logo_algarrobo-374x140.png"
                       alt="" height="69"><?php
                }elseif($fc->concession_idconcession == '2'){
                ?><img src="http://rdeldesierto.cl/wp-content/uploads/2018/04/cropped-logo_desierto-374x140.png"
                       alt="" height="69"><?php
                }
                ?>

            </div>
            <!-- /.col -->
            <div class="col-sm-5 invoice-col">
                <strong>ANTECEDENTES:</strong>
                <table class="table table-striped">
                    <tr>
                        <td><b>FOLIO INTERNO</b></td>
                        <td>:</td>
                        <td>{{  $fc -> folio }}</td>
                    </tr>
                    <tr>
                        <td><b>TIPO TICKET</b></td>
                        <td>:</td>
                        <td>{{  $fc -> type_contact }}</td>
                    </tr>
                    <tr>
                        <td><b>ESTADO</b></td>
                        <td>:</td>
                        <td>@if( $fc -> state == 1)
                                <button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip"
                                        title="Abierto">
                                    <i class="fa fa-times"></i> No Resuelto
                                </button>
                            @elseif($fc->state == 2)
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
                        <td><b>ASUNTO</b></td>
                        <td>:</td>
                        <td>{{  $fc -> subject }}</td>
                    </tr>

                    <tr>
                        <td><b>IP Solicitud</b></td>
                        <td>:</td>
                        <td>
                            <small>{{  $fc -> ip }}</small>
                        </td>
                    </tr>
                </table>

            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <strong>DATOS PERSONALES:</strong>
                <table class="table table-striped">
                    <tr>
                        <td><b>RUT</b></td>
                        <td>:</td>
                        <td>{{  $fc -> rut_person }}</td>
                    </tr>
                    <tr>
                        <td><b>NOMBRE</b></td>
                        <td>:</td>
                        <td>{{  $fc -> name_person }}</td>
                    </tr>
                    <tr>
                        <td><b>DIRECCIÓN</b></td>
                        <td>:</td>
                        <td>{{  $fc -> address }}, {{$fc -> city}}</td>
                    </tr>
                    <tr>
                        <td><b>TELÉFONO</b></td>
                        <td>:</td>
                        <td>{{  $fc -> phone }}</td>
                    </tr>
                    <tr>
                        <td><b>CORREO</b></td>
                        <td>:</td>
                        <td>{{  $fc -> email }}</td>
                    </tr>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <center><h2>FICHA DEL TICKET</h2></center>

        <hr>
        <center>
            @if( $fc -> state == 1)
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#notificar"><i
                            class="fa fa-paper-plane-o"></i> Notificar Respuesta
                </button>
                @if($aw2==0)
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#cerrar"
                            disabled><i
                                class="fa fa-gavel"></i> Cerrar Ticket
                    </button>
                @else
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#cerrar"><i
                                class="fa fa-gavel"></i> Cerrar Ticket
                    </button>
                @endif
            @elseif($fc->state == 2)
                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#notificar"
                        disabled><i
                            class="fa fa-paper-plane-o"></i> Notificar Respuesta
                </button>

                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#cerrar" disabled>
                    <i
                            class="fa fa-gavel"></i> Cerrar Ticket
                </button>
            @endif
        </center>

        <hr>

        <div class="row">
            <!-- accepted payments column -->

            <div class="col-xs-12">
                <p class="lead"><i class="fa fa-edit"></i> <b>MENSAJE:</b></p>

                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    {{  $fc -> message }}
                </p>
            </div>

        </div>
        <hr>

        <div class="row">
            <!-- accepted payments column -->

            <div class="col-xs-12">
                <p class="lead"><i class="fa fa-edit"></i> <b>RESPUESTAS:</b></p>

                <?php
                foreach ($aw as $c){ ?>
                <p>
                    <small><b>Fecha / Hora Respuesta: </b>{{ $c->created_at }}</small>
                </p>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    {{ $c->answers }}
                </p>
                <?php } ?>
            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <p class="lead"><i class="fa fa-car"></i> <b>VEHÍCULO INVOLUCRADO:</b>
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
                        <td>1</td>
                        <td>{{  $fc -> type_vehicle }}</td>
                        <td>{{  $fc -> pp_vehicle }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <hr>
        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">

                <form class="form-horizontal" name="form" target="_blank" action="{{ url('Print') }}" role="form"
                      method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_comp" value="{{  $fc -> id_complaints }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="box-footer">
                        <button name="boton" type="submit" class="btn btn-success pull-left"><i class="fa fa-print"></i>
                            Imprimir Ficha
                        </button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </section>

    <div class="modal fade" id="notificar"
         tabindex="-1" role="dialog"
         aria-labelledby="favoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="favoritesModalLabel">Respuesta Ticket</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="form" action="{{ url('Ticket/Responder') }}" role="form"
                          method="POST" enctype="multipart/form-data">

                        <div class="box-body">

                            <P>Respuesta del Ticket al Usuario vía Correo Electrónico.</P>  <br>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">CC:</label>

                                <div class="col-sm-8">
                                    <input class="form-control pull-right" type="email" name="cc">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">CCO:</label>

                                <div class="col-sm-8">
                                    <input class="form-control pull-right" type="email" name="cco">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">Mensaje:</label>

                                <div class="col-sm-8">
                                    <textarea class="form-control pull-right" name="mensaje" id="" cols="10" rows="5"
                                              required></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="id_cons" value="{{  $fc -> id_complaints }}">
                            <input type="hidden" name="id_conce" value="{{  $fc -> concession_idconcession }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                        <!-- /.box-body -->

                        <div class="modal-footer">
                            <div class="box-footer">
                                <button type="reset" class="btn btn-default">Limpiar Formulario</button>
                                <button name="boton" type="submit" class="btn btn-success pull-right">Responder</button>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cerrar"
         tabindex="-1" role="dialog"
         aria-labelledby="favoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="favoritesModalLabel">Respuesta Ticket</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="form" action="{{ url('Ticket/Cerrar') }}" role="form"
                          method="POST" enctype="multipart/form-data">

                        <div class="box-body">

                            <P>Cerrar Ticket de Contacto.</P>  <br>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">Cerrado Por:</label>

                                <div class="col-sm-8">
                                    <input class="form-control pull-right" type="text" name="close_by"
                                           value="{{ Auth::user()->name }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">Observaciones:</label>

                                <div class="col-sm-8">
                                    <textarea class="form-control pull-right" name="obs" id="" cols="10" rows="5"
                                              required></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="id_cons" value="{{  $fc -> id_complaints }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                        <!-- /.box-body -->

                        <div class="modal-footer">
                            <div class="box-footer">
                                <button type="reset" class="btn btn-default">Limpiar Formulario</button>
                                <button name="boton" type="submit" class="btn btn-primary pull-right">Cerrar Ticket
                                </button>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
