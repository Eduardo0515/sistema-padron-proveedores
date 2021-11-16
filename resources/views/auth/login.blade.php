@extends('layouts.admin_lte_login')

@section('content')

    @isset($url)
        <form method="POST" action='{{ route('proveedor.login') }}'>
        @else
        <form action="{{ route('login') }}-user" method="post"> @endisset
            {{ csrf_field() }}
            @isset($url)
                <div class="form-group has-feedback">
                    <input id="rfc" type="text" class="form-control{{ $errors->has('rfc') ? ' is-invalid' : '' }}" name="rfc"
                        value="{{ old('rfc') }}" required autofocus placeholder="RFC">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('rfc'))
                        <span class="invalid-feedback help-block" role="alert">
                            <strong>{{ $errors->first('rfc') }}</strong>
                        </span>
                    @endif

                </div>
            @else
                <div class="form-group has-feedback">
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                        name="username" value="{{ old('username') }}" required autofocus placeholder="Usuario">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('username'))
                        <span class="invalid-feedback help-block" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            @endisset
            <div class="form-group has-feedback">

                <input id="password" type="password"
                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required
                    placeholder="Contraseña">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="invalid-feedback help-block" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-block btn-primary">Accesar</button>
                </div>
            </div>

            @isset($url)
            <div class="mt-3">
                <small>¿No tiene una cuenta? <a href="{{route('proveedor.showRegister')}}">Registrarse</a></small>
            </div>
            @endisset
        </form>
    @endsection
