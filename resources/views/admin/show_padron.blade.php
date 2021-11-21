@extends('layouts.admin_lte')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3 mx-5">
                <a href="{{ route('admin.padron') }}" class="badge badge-dark mb-3"><i class="fas fa-arrow-left"></i>
                    Regresar</a>

                <h4>Datos del padrón</h4>
                <div class="dropdown-divider"></div>

                <div class="form-group">
                    <label for="tipo_persona" class="col-form-label text-md-right">{{ __('Tipo de persona') }}</label>
                    <div class="">
                        <label type="text" class="form-control" name="tipo_persona">{{ $padron->tipo_persona }}</label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="rfc" class="col-form-label text-md-right">{{ __('RFC') }}</label>
                        <div class="">
                            <label class="form-control" name="rfc">{{ $padron->rfc }}</label>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="correo" class="col-form-label text-md-right">{{ __('Email') }}</label>
                        <div class="">
                            <label class="form-control " name="correo">{{ $padron->correo }}</label>
                        </div>
                    </div>
                </div>

                @if (($padron->tipo_persona == 'Persona moral') | ($padron->tipo_persona == 'Moral'))
                    <div class="form-group">
                        <label for="razon_social" class="col-form-label text-md-right">{{ __('Razón social') }}</label>
                        <div class="">
                            <label class="form-control " name="razon_social">{{ $padron->razon_social }}</label>
                        </div>
                    </div>
                    <h6 class="form-group mt-2">Representante legal</h6>
                @endif

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombres" class="col-form-label text-md-right">{{ __('Nombres') }}</label>

                        <div class="">
                            <label class="form-control">{{ $padron->nombres }}</label>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="apellidos" class=" col-form-label text-md-right">{{ __('Apellidos') }}</label>

                        <div class="">
                            <label class="form-control">{{ $padron->apellidos }}</label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-7">
                        <label for="telefono" class="col-form-label text-md-right">{{ __('Teléfono') }}</label>

                        <label class="form-control">{{ $padron->telefono }}</label>
                    </div>

                    <div class="col-md-5">
                        <label for="extension" class="col-form-label text-md-right">{{ __('Extensión') }}</label>

                        <label class="form-control">{{ $padron->extension }}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="capital_contable"
                        class="col-form-label text-md-right">{{ __('Capital contable') }}</label>

                    <div class="">
                        <label class="form-control">{{ $padron->capital_contable }}</label>

                    </div>
                </div>

                <h5 class="form-group mt-4">Dirección</h5>
                <div class="dropdown-divider"></div>
                <div class="form-row">
                    <div class="form-row col-md-7">
                        <div class="form-group col-md-6">
                            <label for="domicilio" class="col-form-label text-md-right">{{ __('Domicilio') }}</label>

                            <div class="">
                                <label class="form-control">{{ $padron->domicilio }}</label>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="num_exterior"
                                class="col-form-label text-md-right">{{ __('Número exterior') }}</label>

                            <div class="">
                                <label class="form-control">{{ $padron->num_exterior }}</label>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="num_interior"
                                class="col-form-label text-md-right">{{ __('Número interior') }}</label>

                            <div class="">
                                <label class="form-control">{{ $padron->num_interior }}</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="colonia" class="col-form-label text-md-right">{{ __('Colonia') }}</label>

                            <div class="">
                                <label class="form-control">{{ $padron->colonia }}</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="codigo_postal"
                                class="col-form-label text-md-right">{{ __('Código postal') }}</label>

                            <div class="">
                                <label class="form-control">{{ $padron->codigo_postal }}</label>

                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="localidad" class="col-form-label text-md-right">{{ __('Localidad') }}</label>

                            <div class="">
                                <label class="form-control">{{ $padron->localidad }}</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="ciudad" class="col-form-label text-md-right">{{ __('Ciudad') }}</label>

                            <div class="">
                                <label class="form-control">{{ $padron->ciudad }}</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="entidad" class="col-form-label text-md-right">{{ __('Entidad') }}</label>

                            <div class="">
                                <label class="form-control">{{ $padron->entidad }}</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="pais" class="col-form-label text-md-right">{{ __('País') }}</label>

                            <div class="">
                                <label class="form-control">{{ $padron->pais }}</label>
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

                <h4>Documentos</h4>
                <div class="form-row mb-5">
                    @if (count($padron->padronRequisitos) > 0)
                        @foreach ($padron->padronRequisitos as $padronRequisito)
                            <div class="card mb-3 col-md-3 mr-4">
                                <div class="row no-gutters">
                                    <div class="col-md-2 m-3">
                                        <i class="far fa-file-pdf fa-5x"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <p class="card-text">{{ $padronRequisito->nombre }}</p>
                                            <a href="{{ route('admin.opendoc', $padronRequisito->id) }}"
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

                <div class="form-group row my-5 offset-2">
                    <div class="col-md-5">
                        <a href="{{ route('admin.generar-credencial', $padron->id) }}"
                            class="btn btn-success btn-block">
                            Generar Credencial
                        </a>
                    </div>
                    <div class="col-md-5">
                        <a href="{{ route('admin.credencial_previa', $padron->id) }}" target="_blank"
                            class="btn btn-outline-dark btn-block">
                            Vista previa de la credencial
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content_js')
    <script type="text/javascript" src="{{ asset('/js/map.js') }}"></script>
    <script type="text/javascript">
        createMap({{ $padron->latitud }}, {{ $padron->longitud }}, false);
    </script>
@endsection
