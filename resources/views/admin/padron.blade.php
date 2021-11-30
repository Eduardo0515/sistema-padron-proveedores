@extends('layouts.admin_lte')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4 mx-2">
            <div class="col-md-12 d-flex">
                <div class="table-content col-md-9 pr-4">
                    <h4 class="my-4">Padrón</h4>
                    @if (count($padrons) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">RFC</th>
                                    <th scope="col">Tipo persona</th>
                                    <th scope="col">Razón social / Nombre</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($padrons as $padron)
                                    <tr>
                                        <td>{{ $padron->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $padron->rfc }}</td>
                                        <td>{{ $padron->tipo_persona }}</td>
                                        @if (($padron->tipo_persona == 'Persona moral') | ($padron->tipo_persona == 'Moral'))
                                            <td>{{ $padron->razon_social }}</td>
                                        @else
                                            <td>{{ $padron->nombres }} {{ $padron->apellidos }}</td>
                                        @endif
                                        <td> <a href="{{ route('admin.verpadron', $padron->id) }}"
                                                class="text-danger">Ver
                                                datos</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $padrons->links() }}
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
                <div class="col-md-3">
                    <form action="{{ route('admin.exportar_excel') }}" method="POST">
                        @csrf
                        <h5 class="text-center my-4">Filtrar datos</h5>
                        <fieldset class="border border-secondary rounded p-2 mb-3">
                            <legend class="text-bold h6 pl-2">Por R.F.C</legend>
                            <div class="form-group">
                                <input name="rfc" type="text" class="form-control" id="rfc" placeholder="R.F.C">
                            </div>
                        </fieldset>
                        <fieldset class="border border-secondary rounded p-2 mb-3">
                            <legend class="text-bold h6 pl-2">Por fecha</legend>
                            <div class="form-group row">
                                <label class="col-md-2" for="dateFrom">Del</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="date" name="dateFrom" id="dateFrom">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2" for="dateTo">al</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="date" name="dateTo" id="dateTo">
                                </div>
                            </div>
                            <div class="text-center">
                                <small class="text-danger" id="dateMessage"></small>
                            </div>
                        </fieldset>
                        <fieldset class="border border-secondary rounded p-2 mb-3">
                            <legend class="text-bold h6 pl-2">Por tipo de persona</legend>
                            <div class="form-check">
                                <input checked class="form-check-input" type="checkbox" name="persona_fisica"
                                    id="persona_fisica">
                                <label class="form-check-label" for="fisica">
                                    Persona física
                                </label>
                            </div>
                            <div class="form-check">
                                <input checked class="form-check-input" type="checkbox" name="persona_moral"
                                    id="persona_moral">
                                <label class="form-check-label" for="moral">
                                    Persona moral
                                </label>
                            </div>
                            <small class="text-danger" id="tipoMessage"></small>
                        </fieldset>

                        <div class="form-group row">
                            <div class="col-md-5">
                                <a onclick="searchPadron()" class="btn btn-block btn-danger">Filtrar</a>
                            </div>
                            <div class="col-md-7">
                                <!-- <button onclick="exportToExcel()" class="btn btn-block btn-success">Exportar
                                                                                datos</button> -->
                                <button type="submit" class="btn btn-block btn-success">Exportar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content_js')
    <script type="text/javascript" src="{{ asset('/js/padron/padron.js') }}"></script>
@endsection
