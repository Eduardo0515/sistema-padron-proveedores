@extends('layouts.admin_lte')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 mt-4">
                <h4 class="mb-4">Padrón</h4>

                @if (count($padrons) > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Correo usuario</th>
                                <th scope="col">RFC</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($padrons as $padron)
                                <tr>
                                    <td>{{ $padron->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $padron->correo }}</td>
                                    <td>{{ $padron->rfc }}</td>
                                    <td> <a href="{{ route('admin.verpadron', $padron->id) }}" class="text-danger">Ver
                                            todos los datos</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="card">
                        <div class="card-header">
                            Padrón
                        </div>
                        <div class="card-body">
                            <p class="card-text">No hay datos del padrón en este momento.</p>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>

@endsection
