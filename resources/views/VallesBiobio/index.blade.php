@extends('adminlte::layouts.app')
@section('htmlheader_title')
@endsection


@section('main-content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

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
            <h3 class="box-title">Grilla de Tickets SIN RESOLVER - Valles del Biobío -</h3>
            <a class="btn btn-app btn" href="/Tickets/Historico/rHggzTfqae">
                <i class="fa fa-eye"></i> Histórico
            </a>
            <a class="btn btn-app btn" href="/Tickets/Full/rHggzTfqae">
                <i class="fa fa-list-alt"></i> Full Grilla
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
                    <th>Acciones</th>
                    <th>Fecha Ingreso</th>
                    <th>Tipo Ticket</th>
                    <th>Nombre / Fono</th>
                    <th>Asunto</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($complaints as $c){ ?>
                <tr>
                    <td>{{ $c->id_complaints }}</td>
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
                    <td> {{ $c->type_contact }}  </td>
                    <td> {{ $c->name_person }} - {{ $c->phone }}  </td>
                    <td> {{ $c->subject }}</td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Folio</th>
                    <th>Acciones</th>
                    <th>Fecha Apertura</th>
                    <th>Tipo Ticket</th>
                    <th>Nombre / Fono</th>
                    <th>Asunto</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <hr>

@endsection