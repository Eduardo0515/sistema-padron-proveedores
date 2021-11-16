@extends('proveedors.auth')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header m-3">
        <a href="{{ route('solicitud.index') }}" class="badge badge-dark mb-3"><i class="fas fa-arrow-left"></i>
            Regresar</a>
        <h3>
            Documentos necesarios
        </h3>
    </section>

    <!-- Main content -->
    <section class="content">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Oh no!</strong> Ha ocurrido un error con su solicitud.<br><br>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif
        <!-- Small boxes (Stat box) -->
        <div class="m-3 ml-4 mr-4">
            <i>* Documento obligatorio.</i>
            <form method="post" action="{{ route('solicitud.storeDocs') }}" enctype="multipart/form-data">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Documento</th>
                            <th scope="col">Seleccionar documento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requisitos as $requisito)
                            <tr>
                                <td class="col-md-6">{{ $requisito->nombre }}
                                    @if ($requisito->requerido == 1)
                                        * @endif
                                </td>
                                <td class="col-md-4"> <input type="file" name="doc{{ $requisito->id }}"
                                        class="form-control @error('doc{{ $requisito->id }}') is-invalid @enderror"
                                        value={{ old('doc') }}></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <input class="d-none" value="{{ $solicitud->id }}" name="solicitud_id">
                <button type="submit" class="btn btn-danger">Enviar solicitud</button>
            </form>
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@endsection
