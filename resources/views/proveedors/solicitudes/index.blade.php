@extends('proveedors.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">

            <div class="col-md-8">
                <a href="{{ route('proveedor.home') }}" class="badge badge-dark my-3"><i class="fas fa-arrow-left"></i>
                    Regresar</a>

                @if (count($solicitudes) > 0)
                    <h3>Solicitudes realizadas</h3>
                    <div class="my-3 d-flex justify-content-end">
                        <a class="btn btn-danger" href="{{ route('solicitud.create') }}" role="button">Nueva solicitud</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Fecha solicitud</th>
                                <th scope="col">Estatus</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $solicitud)
                                <tr>
                                    <td>{{ $solicitud->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $solicitud->estatus }}</td>
                                    <td> <a href="{{ route('solicitud.show', $solicitud->id) }}" class="text-danger">Ver
                                            solicitud</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="card">
                        <div class="card-header">
                            Solicitudes
                        </div>
                        <div class="card-body">
                            <p class="card-text">No ha iniciado ninguna solicitud.</p>
                            <a class="btn btn-danger" href="{{ route('solicitud.create') }}" role="button">Nueva
                                solicitud</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection