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
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Seleccione Concesionaria a Configurar</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="/Configuraciones">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Concesión</label>
                        <div class="col-sm-5">
                            <select class="form-control pull-right" name="concesion">
                                <?php  foreach ($access as $ac) { ?>
                                <option class="form-control pull-right" value="{{$ac->idconcession}}"> {{ $ac -> name }} </option>
                                <?php }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-left">SELECCIONAR</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
@endsection