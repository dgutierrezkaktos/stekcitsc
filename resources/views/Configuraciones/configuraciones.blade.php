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
    <div class="pad margin no-print">
        <div class="callout callout-warning" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-gears"></i> Configuraciones:</h4>
            Configuraciones para la Concesionaria:
            @if($datos->concesionaria==1) Valles del Biobío @endif
            @if($datos->concesionaria==2) Rutas del Desierto @endif
            @if($datos->concesionaria==3) Ruta del Limarí @endif
            @if($datos->concesionaria==4) Valles del Desierto @endif
            @if($datos->concesionaria==5) Ruta del Algarrobo @endif<br>
            y para el Usuario: {{ Auth::user()->name }}
        </div>
    </div>

    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Configuración Correo Electrónico</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="/ActualizaCorreo">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="conce" value="{{ $datos->concesionaria }}">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo Principal de Recepción y Respuesta</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="correo" value="{{ $datos -> correo }}"
                                   placeholder="Si este campo esta vacio, debe indicar un mail" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo Secundario de Recepción y Respuesta</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="correo2" value="{{ $datos -> correo2 }}"
                                   placeholder="Si este campo esta vacio, debe indicar un mail" required>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="reset" class="btn btn-primary">Limpiar</button>
                        <button type="submit" class="btn btn-success">Guardar Correos</button>
                    </div>
                </form>
            </div>
        </div>

       {{--<div class="col-md-6">
           <!-- general form elements -->
           <div class="box box-primary">
               <div class="box-header with-border">
                   <h3 class="box-title">Cambio de Clave de Usuario</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" method="POST" action="/CambioClave">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
                   <div class="box-body">
                       <div class="form-group">
                           <label for="exampleInputEmail1">Clave Actual</label>
                           <input type="password" name="clave" class="form-control"
                                  placeholder="Indique la clave que actualiza actualmente" required>
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Nueva Clave</label>
                           <input type="password" name="clave_nueva" class="form-control"
                                  placeholder="Indique la nueva contraseña que desea utilizar" required>
                       </div>
                   </div>
                   <!-- /.box-body -->

                   <div class="box-footer">
                       <button type="reset" class="btn btn-primary">Limpiar</button>
                       <button type="submit" class="btn btn-success">Cambiar Clave</button>
                   </div>
               </form>
           </div>
       </div>
    </div>--}}
@endsection