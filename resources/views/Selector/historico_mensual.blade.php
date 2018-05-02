@extends('adminlte::layouts.app')
@section('htmlheader_title')
@endsection


@section('main-content')

    <div>
        <?php
        if($complaints[0]->concession_idconcession == '5'){
        ?><img src="http://rutadelalgarrobo.cl/wp-content/uploads/2016/04/ruta_algarrobo-baja-132x70.png"
               alt="">
        <?php
        }
        ?>
    </div>

    <hr>

    <div class="box box-primary box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Mes: {{ $mes }} {{ $annio }}</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            Archivo Mensual de TK Cerrados
            <a class="btn btn-app btn" id="btnExport" href="#">
                <i class="fa fa-file-excel-o"></i> Bajar Planilla Excel
            </a>
            <hr>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Folio</th>
                    <th>Acciones</th>
                    <th>Fecha Ingreso</th>
                    <th>Fecha Cierre</th>
                    <th>Tipo Ticket</th>
                    <th>Nombre / Fono</th>
                    <th>Asunto</th>
                    <th>Cerrado Por</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($mes_b as $c){ ?>
                <tr>
                    <td>{{ $c->folio }}</td>
                    <td>
                        <div class="btn-group">
                            <form action="{{ url('/Fichas') }}" role="form" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id_comp" value="<?php echo $c->id_complaints?>">
                                <button type="submit" class="btn-xs btn-success">
                                    <i class="fa fa-file"></i> Ver Ficha
                                </button>
                            </form>
                        </div>
                    </td>
                    <td> {{ $c->created_at }}  </td>
                    <td> {{ $c->created_at }}  </td>
                    <td> {{ $c->type_contact }}  </td>
                    <td> {{ $c->name_person }} - {{ $c->phone }}  </td>
                    <td> {{ $c->subject }}</td>
                    <td> {{ $c->closed_by }}</td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Folio</th>
                    <th>Acciones</th>
                    <th>Fecha Apertura</th>
                    <th>Fecha Cierre</th>
                    <th>Tipo Ticket</th>
                    <th>Nombre / Fono</th>
                    <th>Asunto</th>
                    <th>Cerrado Por</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

@endsection