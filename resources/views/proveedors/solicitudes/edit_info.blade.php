@extends('proveedors.auth')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header m-3">
        <a href="{{ route('solicitud.index') }}" class="badge badge-dark mb-3"><i class="fas fa-arrow-left"></i>
            Regresar</a>
        <h3>
            Editar solicitud
        </h3>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="m-3 ml-4 mr-4">

            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('solicitud.update', $solicitud->id) }}">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="tipo_persona"
                                class="col-form-label text-md-right">{{ __('Tipo de persona') }}</label>
                            <div class="">
                                <label type="text" class="form-control"
                                    name="tipo_persona">{{ Auth::user()->tipoPersona->tipo_persona }}</label>
                                @error('tipo_persona')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="rfc" class="col-form-label text-md-right">{{ __('RFC') }}</label>
                                <div class="">
                                    <label class="form-control" name="rfc">{{ Auth::user()->rfc }}</label>
                                    @error('rfc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="correo" class="col-form-label text-md-right">{{ __('Email') }}</label>
                                <div class="">
                                    <label class="form-control " name="correo">{{ Auth::user()->correo }}</label>
                                    @error('correo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        @if ((Auth::user()->tipoPersona->tipo_persona == 'Persona moral') | (Auth::user()->tipoPersona->tipo_persona == 'Moral'))
                            <div class="form-group">
                                <label for="razon_social"
                                    class="col-form-label text-md-right">{{ __('Razón social') }}</label>
                                <div class="">
                                    <label class="form-control "
                                        name="razon_social">{{ Auth::user()->razon_social }}</label>
                                    @error('razon_social')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <h6 class="form-group mt-4">Representante legal</h6>
                        @else
                            <h5 class="form-group mt-4">Información de la persona</h5>
                            <div class="dropdown-divider"></div>
                        @endif

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nombres" class="col-form-label text-md-right">{{ __('Nombres') }}</label>

                                <div class="">
                                    <input id="nombres" type="text"
                                        class="form-control @error('nombres') is-invalid @enderror" name="nombres"
                                        value="{{ old('nombres', $solicitud->nombres) }}" required autocomplete="nombres"
                                        autofocus>

                                    @error('nombres')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="apellidos"
                                    class=" col-form-label text-md-right">{{ __('Apellidos') }}</label>

                                <div class="">
                                    <input id="apellidos" type="text"
                                        class="form-control @error('apellidos') is-invalid @enderror" name="apellidos"
                                        value="{{ old('apellidos', $solicitud->apellidos) }}" required
                                        autocomplete="apellidos" autofocus>

                                    @error('apellidos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-7">
                                <label for="telefono" class="col-form-label text-md-right">{{ __('Teléfono') }}</label>

                                <input id="telefono" type="text"
                                    class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                    value="{{ old('telefono', $solicitud->telefono) }}" required autocomplete="telefono"
                                    autofocus>

                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-5">
                                <label for="extension" class="col-form-label text-md-right">{{ __('Extensión') }}</label>

                                <input id="extension" type="text"
                                    class="form-control @error('extension') is-invalid @enderror" name="extension"
                                    value="{{ old('extension', $solicitud->extension) }}" autocomplete="extension"
                                    autofocus>

                                @error('extension')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="capital_contable"
                                class="col-form-label text-md-right">{{ __('Capital contable') }}</label>

                            <div class="">
                                <input id="capital_contable" type="text"
                                    class="form-control @error('capital_contable') is-invalid @enderror"
                                    name="capital_contable"
                                    value="{{ old('capital_contable', $solicitud->capital_contable) }}" required
                                    autocomplete="capital_contable" autofocus>

                                @error('capital_contable')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <h5 class="form-group mt-4">Dirección</h5>
                        <div class="dropdown-divider"></div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="domicilio" class="col-form-label text-md-right">{{ __('Domicilio') }}</label>

                                <div class="">
                                    <input id="domicilio" type="text"
                                        class="form-control @error('domicilio') is-invalid @enderror" name="domicilio"
                                        value="{{ old('domicilio', $solicitud->domicilio) }}" required
                                        autocomplete="domicilio" autofocus>

                                    @error('domicilio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="num_exterior"
                                    class="col-form-label text-md-right">{{ __('Número exterior') }}</label>

                                <div class="">
                                    <input id="num_exterior" type="text"
                                        class="form-control @error('num_exterior') is-invalid @enderror" name="num_exterior"
                                        value="{{ old('num_exterior', $solicitud->num_exterior) }}" required
                                        autocomplete="num_exterior" autofocus>

                                    @error('num_exterior')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="num_interior"
                                    class="col-form-label text-md-right">{{ __('Número interior') }}</label>

                                <div class="">
                                    <input id="num_interior" type="text"
                                        class="form-control @error('num_interior') is-invalid @enderror" name="num_interior"
                                        value="{{ old('num_interior', $solicitud->num_interior) }}"
                                        autocomplete="num_interior" autofocus>

                                    @error('num_interior')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="colonia" class="col-form-label text-md-right">{{ __('Colonia') }}</label>

                                <div class="">
                                    <input id="colonia" type="text"
                                        class="form-control @error('colonia') is-invalid @enderror" name="colonia"
                                        value="{{ old('colonia', $solicitud->colonia) }}" required autocomplete="colonia"
                                        autofocus>

                                    @error('colonia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="codigo_postal"
                                    class="col-form-label text-md-right">{{ __('Código postal') }}</label>

                                <div class="">
                                    <input id="codigo_postal" type="text"
                                        class="form-control @error('codigo_postal') is-invalid @enderror"
                                        name="codigo_postal"
                                        value="{{ old('codigo_postal', $solicitud->codigo_postal) }}" required
                                        autocomplete="codigo_postal" autofocus>

                                    @error('codigo_postal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="localidad" class="col-form-label text-md-right">{{ __('Localidad') }}</label>

                                <div class="">
                                    <input id="localidad" type="text"
                                        class="form-control @error('localidad') is-invalid @enderror" name="localidad"
                                        value="{{ old('localidad', $solicitud->localidad) }}" required
                                        autocomplete="localidad" autofocus>

                                    @error('localidad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="ciudad" class="col-form-label text-md-right">{{ __('Ciudad') }}</label>

                                <div class="">
                                    <input id="ciudad" type="text"
                                        class="form-control @error('ciudad') is-invalid @enderror" name="ciudad"
                                        value="{{ old('ciudad', $solicitud->ciudad) }}" required autocomplete="ciudad"
                                        autofocus>

                                    @error('ciudad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="entidad" class="col-form-label text-md-right">{{ __('Entidad') }}</label>

                                <div class="">
                                    <input id="entidad" type="text"
                                        class="form-control @error('entidad') is-invalid @enderror" name="entidad"
                                        value="{{ old('entidad', $solicitud->entidad) }}" required autocomplete="entidad"
                                        autofocus>

                                    @error('entidad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="pais" class="col-form-label text-md-right">{{ __('País') }}</label>

                                <div class="">
                                    <input id="pais" type="text" class="form-control @error('pais') is-invalid @enderror"
                                        name="pais" value="{{ old('pais', $solicitud->pais) }}" required
                                        autocomplete="pais" autofocus>

                                    @error('pais')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="latitud" class="col-form-label text-md-right">{{ __('Latitud') }}</label>

                                <div class="">
                                    <input id="latitud" type="text"
                                        class="form-control @error('latitud') is-invalid @enderror" name="latitud"
                                        value="{{ old('latitud', $solicitud->latitud) }}" required autocomplete="latitud"
                                        autofocus>

                                    @error('latitud')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="longitud" class="col-form-label text-md-right">{{ __('Longitud') }}</label>

                                <div class="">
                                    <input id="longitud" type="text"
                                        class="form-control @error('longitud') is-invalid @enderror" name="longitud"
                                        value="{{ old('longitud', $solicitud->longitud) }}" required
                                        autocomplete="longitud" autofocus>

                                    @error('longitud')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="form-group row mb-2">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-danger btn-block">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@endsection
