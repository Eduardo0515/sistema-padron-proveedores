@extends('proveedors.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p>Usuario <strong>{{ Auth::user()->correo }}.</strong></p>
                    </div>
                </div>

                <div class="my-3 d-flex justify-content-end">
                    <a class="btn btn-danger" href="{{route('solicitud.index')}}" role="button">Ver las solicitudes realizadas</a>
                </div>
            </div>
        </div> 
    </div>
@endsection
