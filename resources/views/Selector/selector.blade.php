@extends('adminlte::layouts.app')
@section('htmlheader_title')
@endsection


@section('main-content')


    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Seleccione Concesionaria a Gestionar</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="/Seleccionado">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Concesión</label>
                        <div class="col-sm-3">
                            <select class="form-control pull-right" name="concesion">
                                <?php  foreach ($access as $ac) { ?>
                                <option class="form-control pull-right" value="{{$ac->idconcession}}"> {{ $ac -> name }} </option>
                                <?php }
                                ?>
                            </select>
                        </div>

                        <label for="inputPassword3" class="col-sm-1 control-label"><b>Estado</b></label>
                        <div class="col-sm-4">
                            <select class="form-control pull-right" id="estado_js" name="accion">
                                <option class="form-control pull-right" value="1"> Ver Tickets Abiertos </option>
                                <option class="form-control pull-right" value="2"> Ver Cronológicos Mensuales (TK Cerrados) </option>
                                <option class="form-control pull-right" value="3"> Ver Cronológicos Anuales (TK Cerrados) </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Mes</label>
                        <div class="col-sm-3">
                            <select class="form-control pull-right" id="mes_js" name="mes">
                                <option class="form-control pull-right" value="01"> Enero </option>
                                <option class="form-control pull-right" value="02"> Febrero </option>
                                <option class="form-control pull-right" value="03"> Marzo </option>
                                <option class="form-control pull-right" value="04"> Abril </option>
                                <option class="form-control pull-right" value="05"> Mayo </option>
                                <option class="form-control pull-right" value="06"> Junio </option>
                                <option class="form-control pull-right" value="07"> Julio </option>
                                <option class="form-control pull-right" value="08"> Agosto </option>
                                <option class="form-control pull-right" value="09"> Septiembre </option>
                                <option class="form-control pull-right" value="10"> Octubre </option>
                                <option class="form-control pull-right" value="11"> Noviembre </option>
                                <option class="form-control pull-right" value="12"> Diciembre </option>
                            </select>
                        </div>

                        <label for="inputPassword3" class="col-sm-1 control-label">Año</label>
                        <div class="col-sm-4">
                            <select class="form-control pull-right" id="annio_js" name="annio">
                                <option class="form-control pull-right" value="2016"> 2016 </option>
                                <option class="form-control pull-right" value="2017"> 2017 </option>
                                <option class="form-control pull-right" value="2018" selected> 2018 </option>
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