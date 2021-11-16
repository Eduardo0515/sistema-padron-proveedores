@extends('layouts.admin_lte')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/inicio') }}">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <!-- /.card-header -->
              <div class="card-header">
                <h3 class="card-title">Listado de Usuarios</h3>

                <div class="card-tools">
                <a class="btn btn-default" href="{{ url('/usuarios/create') }}"><i class="fa fa-plus"></i> Nuevo</a>
                </div>
              </div>
              <div class="card-body">
                <div id="datosTabla" class="box-body table-both-scroll"></div>
              </div>

            </div>
          <div>
        </div>
      </div>
    </section>
@stop
@section('content_modals')
    <div class="modal fade" id="ModalInfo"  tabindex="-1" role="basic" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="ModalTitleInfo">Formulario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div id="ModalBody">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@stop
@section('content_js')
<script src="{{ asset('js/bootbox/bootbox.min.js') }}"></script>
<script src="{{ asset('js/usuarios-list.js') }}"></script>
@stop