@extends('proveedors.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h5>Bienvenido</h5>
                        <p>R.F.C.: <strong>{{ Auth::user()->rfc }}.</strong></p>
                        <p>Correo: <strong>{{ Auth::user()->correo }}.</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
