@extends('adminlte::layouts.app')
@section('htmlheader_title')
@endsection


@section('main-content')

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $reclamos  }}</h3>

                    <p>Reclamos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-thumbs-o-down"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ $info  }}<sup style="font-size: 20px"></sup></h3>

                    <p>Consultas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-question"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3> {{ $sugerencia }}</h3>

                    <p>Sugerencias</p>
                </div>
                <div class="icon">
                    <i class="fa fa-exclamation"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$felicitaciones}}</h3>

                    <p>Felicitaciones</p>
                </div>
                <div class="icon">
                    <i class="fa fa-thumbs-o-up"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-md-4">

        </div>
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Grilla de TODOS los Tickets - Rutas del Desierto -</h3>
            <a class="btn btn-app btn" href="/Tickets/VVvarLnNDb">
                <i class="fa fa-eye"></i> Actual
            </a>
            <a class="btn btn-app btn" href="/Tickets/Historico/VVvarLnNDb">
                <i class="fa fa-list-alt"></i> Histórico Grilla
            </a>
            <a class="btn btn-app btn" id="btnExport" href="#">
                <i class="fa fa-file-excel-o"></i> Exportar
            </a>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Folio</th>
                    <th>Fecha Ingreso</th>
                    <th>Tipo Ticket</th>
                    <th>Nombre / Fono</th>
                    <th>Correo</th>
                    <th>Asunto</th>
                    <th>Mensaje</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($complaints as $c){ ?>
                <tr>
                    <td>{{ $c->id_complaints }}</td>
                    <td>{{ $c->folio }}</td>
                    <td>{{ $c->created_at }}</td>
                    <td>{{ $c->type_contact }}</td>
                    <td>{{ $c->name_person}} - {{$c->phone }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ $c->subject }}</td>
                    <td>{{ $c->message }}</td>
                    <td> @if($c->state==1)
                            Abierto
                        @else
                            Cerrado
                        @endif
                    </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <th>ID</th>
                <th>Folio</th>
                <th>Fecha Ingreso</th>
                <th>Tipo Ticket</th>
                <th>Nombre / Fono</th>
                <th>Correo</th>
                <th>Asunto</th>
                <th>Mensaje</th>
                <th>Estado</th>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <hr>

@endsection