@extends('proveedors.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">

            <div class="col-md-8">
                
                    <div class="card">
                        <h5 class="card-header">Pago realizado</h5>
                        <div class="card-body">
                          <h5 class="card-title my-2">La solicitud ha finalizado.</h5>
                          <p class="card-text">Ahora puede pasar a la dependencia para tramitar su credencial.</p>
                          <a href="{{ route('proveedor.home') }}" class="btn btn-danger">Aceptar</a>
                        </div>
                      </div>
                
            </div>
        </div>
    </div>

@endsection
