@extends('layouts.admin_lte')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 mt-4">
                <h4 class="mb-4">Solicitudes</h4>

                @if (count($solicitudes) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Fecha solicitud</th>
                                <th scope="col">Correo usuario</th>
                                <th scope="col">RFC</th>
                                <th scope="col">Estatus</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $solicitud)
                                <tr>
                                    <td>{{ $solicitud->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $solicitud->correo }}</td>
                                    <td>{{ $solicitud->rfc }}</td>
                                    <td>{{ $solicitud->estatus }}</td>
                                    <td> <a href="{{ route('admin.versolicitud', $solicitud->id) }}"
                                            class="text-danger">Ver
                                            todos los datos</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $solicitudes->links() }}
                @else
                    <h5>No hay solicitudes actualmente.</h5>
                    
                @endif
            </div>
        </div>
    </div>

@endsection
