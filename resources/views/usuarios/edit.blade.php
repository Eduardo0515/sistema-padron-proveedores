@extends('layouts.admin_lte')
@section('content_css')
<link href="{{ asset('css/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@stop
@section('content')

        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Editar</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('/inicio') }}">Inicio</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('/usuarios') }}">usuarios</a></li>
                  <li class="breadcrumb-item active">Editar</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>


        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">

                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Datos de Acceso</h3>
                  </div>
                  <!-- /.card-header -->
                  <form class="form-horizontal" id="form1" name="form1">
                  <div class="card-body">
                  
                  
                      <div class="box-body">    
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                  <label>Usuario (Correo)</label><input type="text" class="form-control" id="username" name="username" aria-required="true" aria-describedby="url-error" aria-invalid="true" placeholder="usuario@mail.com" value="@php echo $info->username @endphp"><span class="glyphicon glyphicon-user form-control-feedback"></span>
                                  </div>
                              </div>

                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                  <label>Contraseña</label><input type="password" class="form-control" id="password" name="password" aria-required="true" aria-describedby="url-error" aria-invalid="true">
                                  <span class="glyphicon glyphicon-lock  form-control-feedback"></span>
                                  </div>
                              </div>


                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                  <label>Confirmar Contraseña</label><input type="password" class="form-control" id="re_password" name="re_password" aria-required="true" aria-describedby="url-error" aria-invalid="true">
                                  <span class="glyphicon glyphicon-lock  form-control-feedback"></span>
                                  </div>
                              </div>

                                                              
                          </div>



                          <div class="box-header with-border">
                          <h3 class="box-title">Datos Personales</h3>
                          </div><!-- /.box-header -->
                          

                          <div class="row">

                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                  <label>Nombre</label><input type="text" class="form-control" id="nombre" name="nombre" aria-required="true" aria-describedby="url-error" aria-invalid="true" placeholder="Nombre" value="@php echo $info->nombres @endphp">
                                  <span class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                  </div>
                              </div>


                              <div class="col-md-4">
                                  <div class="form-group has-feedback">
                                  <label>Apellidos</label><input class="form-control" type="text" id="apellidos" name="apellidos" value="@php echo $info->apellidos @endphp" placeholder="Apellidos">
                                  <span class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                  </div>
                              </div>
                              

                              <div class="col-md-4">
                                  <div class="form-group">
                                  <label>Dependencia</label>
                                          <select class="form-control select2" style="width: 100%;" id="dependencia_id" name="dependencia_id">
                                              <option value="" selected>Seleccione Dependencia</option>
                                              @foreach($dependencia_items as $item)
                                              <option value="{{$item->id}}" {{  ($item->id == $info->dependencia_id ? ' selected' : '') }}>{{$item->dependencia}}</option>
                                              @endforeach
                                          </select>
                                  </div>
                              </div>

                          </div>

                          <div class="row">
                              <div class="col-md-3">
                                  <div class="form-group has-feedback">
                                  <label>Area que labora</label><input class="form-control" type="text" id="area_labora" name="area_labora" value="@php echo $info->area_labora @endphp" placeholder="Area que labora">
                                  <span class="glyphicon glyphicon-info-sign  form-control-feedback"></span>
                                  </div>
                              </div>

                              <div class="col-md-3">
                                  <div class="form-group has-feedback">
                                  <label>Tel. Oficina</label><input class="form-control" type="text" id="tel_oficina" name="tel_oficina" value="@php echo $info->tel_oficina @endphp" placeholder="Telefono Oficina">
                                  <span class="glyphicon glyphicon-phone-alt  form-control-feedback"></span>
                                  </div>
                              </div>

                              <div class="col-md-3">
                                  <div class="form-group has-feedback">
                                  <label>Numero de extension(es)</label><input class="form-control" type="text" id="extension" name="extension" value="@php echo $info->extension @endphp" placeholder="Extension(es)">
                                  <span class="glyphicon glyphicon-phone-alt  form-control-feedback"></span>
                                  </div>
                              </div>
                              
                              <div class="col-md-3">
                                  <div class="form-group has-feedback">
                                  <label>Celular</label><input class="form-control" type="text" name="celular" value="@php echo $info->celular @endphp" placeholder="Celular">
                                  <span class="glyphicon glyphicon-phone  form-control-feedback"></span>
                                  </div>
                              </div>
                          </div>
                          
                      </div>

                      <div class="box-footer">
                        <input type="hidden" name="id_registro" id="id_registro" value="@php echo $info->id @endphp">
                            <button type="button"  onclick="window.location.href='{{ url('/usuarios') }}'" class="btn btn-default">Cancelar</button>
                            <button type="submit" id="btnSave" name="btnSave" class="btn btn-info float-right">Guardar</button>
                    </div><!-- /.box-footer -->
                      
                  
                  </div>
                  
                  </form>
          <div>
        </div>
      </div>
    </section>
@stop
@section('content_js')
<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('js/bootbox/bootbox.min.js') }}"></script>
<script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('js/usuarios-edit.js') }}"></script>
<script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
      });
</script>
@stop