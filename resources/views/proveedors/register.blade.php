@extends('proveedors.proveedor_main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <p class="font-weight-bold">{{ __('Register') }}</p>
                        <i class="d-block">En caso de contar con una cuenta, <a
                                href="{{ route('proveedor.login') }}">Iniciar sesión</a></i>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('proveedor.register') }}">
                            @csrf

                            <div class="form-group">
                                <label for="tipo_persona"
                                    class="col-form-label text-md-right">{{ __('Tipo de persona') }}</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Seleccione</label>
                                    </div>
                                    <select id="select_tipo_persona" class="custom-select" id="inputGroupSelect01"
                                        name="tipo_persona">
                                        @foreach ($tipo_personas as $tipo_persona)
                                            <option value="{{ $tipo_persona->id }}">
                                                {{ $tipo_persona->tipo_persona }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('tipo_persona')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="rfc" class="col-form-label text-md-right">{{ __('RFC') }}</label>

                                    <div class="">
                                        <input id="rfc" type="text" class="form-control @error('rfc') is-invalid @enderror"
                                            name="rfc" value="{{ old('rfc') }}" required autocomplete="rfc" autofocus>

                                        @error('rfc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="correo" class="col-form-label text-md-right">{{ __('Email') }}</label>

                                    <div class="">
                                        <input id="correo" type="email"
                                            class="form-control @error('correo') is-invalid @enderror" name="correo"
                                            value="{{ old('correo') }}" required autocomplete="correo">

                                        @error('correo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="password"
                                        class="col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="password-confirm"
                                        class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" id="div-razon">
                                <label for="razon_social"
                                    class="col-form-label text-md-right">{{ __('Razón social') }}</label>
                                <div class="">
                                    <input id="razon_social" type="text"
                                        class="form-control @error('razon_social') is-invalid @enderror" name="razon_social"
                                        value="{{ old('razon_social') }}" autocomplete="razon_social" autofocus>

                                    @error('razon_social')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row my-3">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-danger btn-block">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        let divRazonSocial = document.getElementById('div-razon');
        divRazonSocial.style = "display:none";

        $('#select_tipo_persona').on('change', function() {
            let conceptName = $('#select_tipo_persona').find(":selected").text();
            if (conceptName.trim() == 'Persona moral' | conceptName.trim() == 'Moral') {
                divRazonSocial.style = "display:block";
            } else {
                divRazonSocial.style = "display:none";
            }
        });
    </script>
@endsection
