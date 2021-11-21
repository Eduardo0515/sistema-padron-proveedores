@extends('layouts.admin_lte')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3 mx-5">
                <a href="{{ route('admin.solicitudes') }}" class="badge badge-dark mb-3"><i class="fas fa-arrow-left"></i>
                    Regresar</a>

                <h4>Datos del solicitante</h4>
                <div class="dropdown-divider"></div>

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
                    <div class="form-row col-md-7">
                        <div class="form-group col-md-6">
                            <label for="domicilio" class="col-form-label text-md-right">{{ __('Domicilio') }}</label>

                            <div class="">
                                <label class="form-control">{{ $solicitud->domicilio }}</label>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="num_exterior"
                                class="col-form-label text-md-right">{{ __('Número exterior') }}</label>

                            <div class="">
                                <label class="form-control">{{ $solicitud->num_exterior }}</label>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="num_interior"
                                class="col-form-label text-md-right">{{ __('Número interior') }}</label>

                            <div class="">
                                <label class="form-control">{{ $solicitud->num_interior }}</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="colonia" class="col-form-label text-md-right">{{ __('Colonia') }}</label>

                            <div class="">
                                <label class="form-control">{{ $solicitud->colonia }}</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="codigo_postal"
                                class="col-form-label text-md-right">{{ __('Código postal') }}</label>

                            <div class="">
                                <label class="form-control">{{ $solicitud->codigo_postal }}</label>

                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="localidad" class="col-form-label text-md-right">{{ __('Localidad') }}</label>

                            <div class="">
                                <label class="form-control">{{ $solicitud->localidad }}</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="ciudad" class="col-form-label text-md-right">{{ __('Ciudad') }}</label>

                            <div class="">
                                <label class="form-control">{{ $solicitud->ciudad }}</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="entidad" class="col-form-label text-md-right">{{ __('Entidad') }}</label>

                            <div class="">
                                <label class="form-control">{{ $solicitud->entidad }}</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="pais" class="col-form-label text-md-right">{{ __('País') }}</label>

                            <div class="">
                                <label class="form-control">{{ $solicitud->pais }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="map" class="offset-1 text-primary col-form-label text-md-right">Ubicación</label>

                        <div class="form-group col-md-12">
                            <div id="map" style="height: 300px; width:100%"></div>
                        </div>

                        <input id="latitud" type="text" class="form-control d-none" name="latitud"
                            value="{{ old('latitud') }}" required>

                        <div class="">
                            <input id="longitud" type="text" class="form-control d-none" name="longitud"
                                value="{{ old('longitud') }}" required>
                        </div>

                    </div>
                </div>

                <h4>Documentos subidos</h4>
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

                <h4>Comentarios</h4>
                <!-- Button trigger comentarios modal -->
                <button type="button" class="btn btn-outline-dark btn-sm" data-toggle="modal"
                    data-target="#comentariosModal" onclick="showComentarios({{ $solicitud->id }})">
                    Ver comentarios
                </button>
                <!-- End Button comentarios modal -->

                <div class="form-group row my-5 offset-2">
                    <div class="col-md-5">
                        <a href="{{ route('admin.aceptar', $solicitud->id) }}" class="btn btn-danger btn-block">
                            Aceptar solicitud
                        </a>
                    </div>
                    <div class="col-md-5">
                        <button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal"
                            data-target="#rechazar-solicitud">
                            Rechazar solicitud
                        </button>
                    </div>
                </div>

                <!--Comentarios Modal -->
                <div class="modal fade" id="comentariosModal" tabindex="-1" role="dialog"
                    aria-labelledby="comentariosModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="comentariosModalLabel">Comentarios</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body comentarios-body">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal Comentarios-->

                <!-- Rechazar solicitud Modal-->
                <div class="modal fade" id="rechazar-solicitud" tabindex="-1" role="dialog"
                    aria-labelledby="rechazar-solicitudLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rechazar-solicitudLabel">Comentario</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('admin.rechazar') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="tipo_rechazo"
                                            class="col-form-label text-md-right">{{ __('Tipo de rechazo') }}</label>
                                        <div class="">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input @error('tipo_rechazo') is-invalid @enderror"
                                                    type="radio" name="tipo_rechazo" id="radio-observacion"
                                                    value="Para corrección" checked>
                                                <label class="form-check-label" for="radio-observacion">
                                                    Para corrección
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input @error('tipo_rechazo') is-invalid @enderror"
                                                    type="radio" name="tipo_rechazo" id="radio-definitivo"
                                                    value="Rechazada">
                                                <label class="form-check-label" for="radio-definitivo">
                                                    Rechazo definitivo
                                                </label>
                                            </div>
                                            @error('tipo_rechazo')
                                                <span class="invalid-feedback" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                            <small class="m-1" id="mensaje-rechazar">Al utilizar esta opción, la
                                                solicitud no podrá corregirse y será eliminada.</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Escribir comentario</label>
                                        <textarea name="comentario"
                                            class="form-control @error('comentario') is-invalid @enderror"
                                            id="exampleFormControlTextarea1" rows="3">{{ old('comentario') }}</textarea>
                                        @error('comentario')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input style="display:none" type="text" name="solicitud_id"
                                            value="{{ $solicitud->id }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-danger">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal Rechazar solicitud-->

            </div>
        </div>
    </div>
@endsection

@section('content_js')
    @if (count($errors) > 0)
        <script type="text/javascript">
            $('#rechazar-solicitud').modal('show');
        </script>
    @endif

    <script type="text/javascript">
        // Mostrar los comentarios en el modal
        function showComentarios(solicitud_id) {
            $.ajax({
                url: '{{ route('comentario.read') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    solicitud_id: solicitud_id
                },
                success: function(data) {
                    $('.comentarios-body').html(data)
                },
            });
        }
        $('#mensaje-rechazar').css("display", "none");
        // Mostrar advertencia sobre el tipo de rechazo
        $("#radio-observacion").change(function() {
            $('#mensaje-rechazar').css("display", "none");
        });
        $("#radio-definitivo").change(function() {
            $('#mensaje-rechazar').css("display", "block");
        });
    </script>
    <script type="text/javascript" src="{{ asset('/js/map.js') }}"></script>
    <script type="text/javascript">
        createMap({{ $solicitud->latitud }}, {{ $solicitud->longitud }}, false);
    </script>
@endsection
