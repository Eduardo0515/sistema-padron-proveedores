@extends('proveedors.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">

            <div class="col-md-8">

                @if (count($solicitudes) > 0)
                    <div class="my-3 d-flex justify-content-between">
                        <h3>Solicitudes realizadas</h3>
                        <a class="btn btn-danger" href="{{ route('solicitud.create') }}" role="button">Nueva solicitud</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Fecha solicitud</th>
                                <th scope="col">RFC</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Estatus</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $solicitud)
                                <tr>
                                    <td>{{ $solicitud->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $solicitud->rfc }}</td>
                                    <td>{{ $solicitud->nombres }}</td>
                                    <td>{{ $solicitud->apellidos }}</td>
                                    <td>{{ $solicitud->estatus }}</td>
                                    <td> <a href="{{ route('solicitud.show', $solicitud->id) }}" class="text-danger">Ver
                                            <i class="fas fa-eye"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $solicitudes->links() }}
                @else
                    <div class="card mt-4">
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
