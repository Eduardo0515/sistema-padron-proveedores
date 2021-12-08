@extends('layouts.admin_lte')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Requisitos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/inicio') }}">Inicio</a></li>
                        <li class="breadcrumb-item active">Requisitos</li>
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
                            <h3 class="card-title">Listado de requisitos</h3>

                            <div class="card-tools">
                                <button class="btn btn-default" data-toggle="modal" data-target="#addRequisito"><i
                                        class="fa fa-plus"></i> Nuevo</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="tablaRequisitos" class="box-body table-both-scroll">

                            </div>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
    </section>
    <!-- End Main content -->

    <!-- Modal add requisito -->
    <div class="modal fade" id="addRequisito" tabindex="-1" role="dialog" aria-labelledby="addRequisitoLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addRequisitoLabel">Agregar requisito</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.requisito.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre del requisito</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                placeholder="Nombre del requisito" value="{{ old('nombre') }}">
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nombre">Requisito obligatorio</label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('requerido') is-invalid @enderror"
                                    name="requerido" checked value="truee">
                                <label class="form-check-label" for="requerido">Obligatorio</label>
                            </div>
                            @error('requerido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal add requisito -->

    <!-- Modal edit requisito -->
    <div class="modal fade" id="editRequisitoModal" tabindex="-1" role="dialog"
        aria-labelledby="editRequisitoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRequisitoModalLabel">Editar requisito</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_edit" action="{{ route('admin.requisito.update', 1) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre_edit">Nombre del requisito</label>
                            <input id="nombre_edit" type="text" class="form-control @error('nombre_edit') is-invalid @enderror"
                                name="nombre_edit" placeholder="Nombre del requisito" value="{{ old('nombre_edit') }}">
                            @error('nombre_edit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nombre">Requisito obligatorio</label>
                            <div class="form-check">
                                <input id="requerido_edit" type="checkbox" class="form-check-input @error('requerido') is-invalid @enderror"
                                    name="requerido_edit" checked value="truee">
                                <label class="form-check-label" for="requerido">Obligatorio</label>
                            </div>
                            @error('requerido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal edit requisito -->
@stop

@section('content_js')
    <script src="{{ asset('js/bootbox/bootbox.min.js') }}"></script>
    @if (count($errors) > 0)
        @if ($errors->first('nombre') != null)
            <script type="text/javascript">
                $('#addRequisito').modal('show');
            </script>
        @else
            <script type="text/javascript">
                $('#editRequisitoModal').modal('show');
            </script>
        @endif
    @endif

    <script src="{{ asset('js/catalogos/requisitos.js') }}"></script>
@stop
