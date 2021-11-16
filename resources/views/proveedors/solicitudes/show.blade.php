@extends('proveedors.auth')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header m-3">
        <a href="{{ route('solicitud.index') }}" class="badge badge-dark"><i class="fas fa-arrow-left"></i> Regresar</a>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class=" mx-4 ">

            @if ($solicitud->estatus == 'En captura')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title my-2"><strong>Solicitud sin completar</strong></h5>
                        <p class="card-text">Para completar la solicitud, es necesario que agregue los documentos
                            requeridos.</p>
                        <a href="{{ route('solicitud.createDocs', $solicitud->id) }}" class="card-link">Completar
                            solicitud</a>
                    </div>
                </div>
            @else
                @if ($solicitud->estatus == 'Aceptada')
                    <div class="card">
                        <div class="card-header bg-green">Solicitud aceptada</div>
                        <div class="card-body">
                            <p class="card-text">Su solicitud ha sido aceptada, para finalizar el proceso realice
                                el
                                pago correspondiente.</p>
                            <a href="{{ route('solicitud.pago', $solicitud->id) }}"
                                class="card-link text-success"><strong>Realizar pago</strong></a>
                        </div>
                    </div>
                @endif
                @if ($solicitud->estatus == 'Para corrección')
                    <div class="card">
                        <div class="card-header bg-warning">La solicitud debe ser corregida</div>
                        <div class="card-body">
                            <p class="card-text">Su solicitud ha sido rechazada, realice la corrección para continuar
                                con su solicitud.</p>
                            <a href="{{ route('solicitud.edit', $solicitud->id) }}"
                                class="card-link text-dark"><strong>Corregir solicitud</strong></a>
                        </div>
                    </div>
                @endif

                <h4>Datos</h4>
                <div class="dropdown-divider"></div>

                <!--<div class="form-group">
                                                        <label for="fecha" class="col-form-label text-md-right">{{ __('Fecha de solicitud') }}</label>
                                                        <div class="">
                                                            <label type="text" class="form-control"
                                                                name="fecha">{{ $solicitud->created_at->format('d-m-Y') }}</label>
                                                        </div>
                                                    </div>
                                                    -->

                <div class="form-group">
                    <label for="tipo_persona" class="col-form-label text-md-right">{{ __('Tipo de persona') }}</label>
                    <div class="">
                        <label type="text" class="form-control"
                            name="tipo_persona">{{ $solicitud->tipo_persona }}</label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="rfc" class="col-form-label text-md-right">{{ __('RFC') }}</label>
                        <div class="">
                            <label class="form-control" name="rfc">{{ $solicitud->rfc }}</label>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="correo" class="col-form-label text-md-right">{{ __('Email') }}</label>
                        <div class="">
                            <label class="form-control " name="correo">{{ $solicitud->correo }}</label>
                        </div>
                    </div>
                </div>

                @if (($solicitud->tipo_persona == 'Persona moral') | ($solicitud->tipo_persona == 'Moral'))
                    <div class="form-group">
                        <label for="razon_social" class="col-form-label text-md-right">{{ __('Razón social') }}</label>
                        <div class="">
                            <label class="form-control " name="razon_social">{{ $solicitud->razon_social }}</label>
                        </div>
                    </div>
                    <h6 class="form-group mt-2">Representante legal</h6>
                @endif

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombres" class="col-form-label text-md-right">{{ __('Nombres') }}</label>

                        <div class="">
                            <label class="form-control">{{ $solicitud->nombres }}</label>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="apellidos" class=" col-form-label text-md-right">{{ __('Apellidos') }}</label>

                        <div class="">
                            <label class="form-control">{{ $solicitud->apellidos }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-7">
                        <label for="telefono" class="col-form-label text-md-right">{{ __('Teléfono') }}</label>

                        <label class="form-control">{{ $solicitud->telefono }}</label>
                    </div>

                    <div class="col-md-5">
                        <label for="extension" class="col-form-label text-md-right">{{ __('Extensión') }}</label>

                        <label class="form-control">{{ $solicitud->extension }}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="capital_contable"
                        class="col-form-label text-md-right">{{ __('Capital contable') }}</label>

                    <div class="">
                        <label class="form-control">{{ $solicitud->capital_contable }}</label>

                    </div>
                </div>

                <h5 class="form-group mt-4">Dirección</h5>
                <div class="dropdown-divider"></div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="domicilio" class="col-form-label text-md-right">{{ __('Domicilio') }}</label>

                        <div class="">
                            <label class="form-control">{{ $solicitud->domicilio }}</label>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="num_exterior"
                            class="col-form-label text-md-right">{{ __('Número exterior') }}</label>

                        <div class="">
                            <label class="form-control">{{ $solicitud->num_exterior }}</label>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="num_interior"
                            class="col-form-label text-md-right">{{ __('Número interior') }}</label>

                        <div class="">
                            <label class="form-control">{{ $solicitud->num_interior }}</label>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="colonia" class="col-form-label text-md-right">{{ __('Colonia') }}</label>

                        <div class="">
                            <label class="form-control">{{ $solicitud->colonia }}</label>
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="codigo_postal" class="col-form-label text-md-right">{{ __('Código postal') }}</label>

                        <div class="">
                            <label class="form-control">{{ $solicitud->codigo_postal }}</label>

                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="localidad" class="col-form-label text-md-right">{{ __('Localidad') }}</label>

                        <div class="">
                            <label class="form-control">{{ $solicitud->localidad }}</label>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="ciudad" class="col-form-label text-md-right">{{ __('Ciudad') }}</label>

                        <div class="">
                            <label class="form-control">{{ $solicitud->ciudad }}</label>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="entidad" class="col-form-label text-md-right">{{ __('Entidad') }}</label>

                        <div class="">
                            <label class="form-control">{{ $solicitud->entidad }}</label>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="pais" class="col-form-label text-md-right">{{ __('País') }}</label>

                        <div class="">
                            <label class="form-control">{{ $solicitud->pais }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="latitud" class="col-form-label text-md-right">{{ __('Latitud') }}</label>

                        <div class="">
                            <label class="form-control">{{ $solicitud->latitud }}</label>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="longitud" class="col-form-label text-md-right">{{ __('Longitud') }}</label>

                        <div class="">
                            <label class="form-control">{{ $solicitud->longitud }}</label>
                        </div>
                    </div>

                </div>

                <h4>Documentos</h4>
                <div class="dropdown-divider"></div>
                <div class="form-row">
                    @if (count($solicitud->solicitudRequisitos) > 0)
                        @foreach ($solicitud->solicitudRequisitos as $solicitudRequisito)
                            <div class="card mb-3 col-md-3 mr-4">
                                <div class="row no-gutters">
                                    <div class="col-md-2 m-3">
                                        <i class="far fa-file-pdf fa-5x"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <p class="card-text">{{ $solicitudRequisito->nombre }}</p>
                                            <a href="{{ route('admin.opendoc', $solicitudRequisito->id) }}"
                                                class="card-link">Ver
                                                documento</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="m-1 mb-2">No hay documentos subidos.</p>
                    @endif
                </div>

                <h5>Comentarios</h5>
                <div class="dropdown-divider"></div>
                @if (count($solicitud->comentarios) > 0)
                    <div class="overflow-auto border border-secondary rounded p-2 mb-5" style="height: 120px">
                        @foreach ($solicitud->comentarios as $comentario)
                            <small>{{ $comentario->created_at->format('d-m-Y') }}</small>
                            <p>{{ $comentario->comentario }}</p>
                        @endforeach
                    </div>
                @else
                    <p class="mb-5">Aún no ha recibido comentarios.</p>
                @endif
            @endif

        </div>

        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@endsection
