@extends('proveedors.auth')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header m-3">
        <a href="{{ route('solicitud.show', $solicitud->id) }}" class="badge badge-dark mb-3"><i
                class="fas fa-arrow-left"></i>
            Regresar</a>
        <h3>
            Editar documentos
        </h3>
    </section>

    <!-- Main content -->
    <section class="content">
        @if (session('no-update'))
            <div class="alert alert-secondary">
                <button type="button" class="close rounded-circle bg-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('no-update') }}
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close rounded-circle bg-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Oh no!</strong> Ha ocurrido un error con la operación.<br><br>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif
        <!-- Small boxes (Stat box) -->
        <div class="m-3 ml-4 mr-4">
            <i>* Si hay un documento existente para un requisito en específico, será reemplazado al subir otro
                documento.</i>
            <form method="post" action="{{ route('solicitud.updateDocs', $solicitud->id) }}"
                enctype="multipart/form-data">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Documento</th>
                            <th scope="col">Seleccionar documento</th>
                            <th scope="col">Documento existente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--  @foreach ($solicitud->solicitudRequisitos as $solicitudRequisito)
                                                            <tr>
                                                                <td class="col-md-4">{{ $solicitudRequisito->nombre }}</td>
                                                                <td class="col-md-4"> <input type="file"
                                                                        name="doc{{ $solicitudRequisito->requisito_id }}"
                                                                        class="form-control @error('doc{{ $solicitudRequisito->requisito_id }}') is-invalid @enderror">
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('doc.open', $solicitudRequisito->id) }}" class="card-link">Ver
                                                                        documento</a>
                                                                </td>
                                                        @endforeach -->
                        @foreach ($requisitos as $requisito)
                            <tr>
                                <td class="col-md-4">{{ $requisito->nombre }}</td>
                                <td class="col-md-4"> <input type="file" name="doc{{ $requisito->id }}"
                                        class="form-control @error('doc{{ $requisito->id }}') is-invalid @enderror">
                                </td>
                                @if ($requisito->docExists)
                                    <td>
                                        <a href="{{ route('doc.open', $requisito->solicitudReqId) }}"
                                            class="card-link" target="_blank">Ver
                                            documento</a>
                                    </td>
                                @else
                                    <td>No hay documento</td>
                                @endif
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-danger">Guardar cambios</button>
            </form>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@endsection
