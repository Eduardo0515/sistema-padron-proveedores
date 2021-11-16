@extends('proveedors.auth')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header m-3">
        <h4>Mi información</h4>
        <div class="dropdown-divider"></div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class=" mx-4 ">


            <div class="form-group">
                <label for="tipo_persona" class="col-form-label text-md-right">{{ __('Tipo de persona') }}</label>
                <div class="">
                    <label type="text" class="form-control"
                        name="tipo_persona">{{ Auth::user()->tipoPersona->tipo_persona }}</label>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="rfc" class="col-form-label text-md-right">{{ __('RFC') }}</label>
                    <div class="">
                        <label class="form-control" name="rfc">{{ Auth::user()->rfc }}</label>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="correo" class="col-form-label text-md-right">{{ __('Email') }}</label>
                    <div class="">
                        <label class="form-control " name="correo">{{ Auth::user()->correo }}</label>
                    </div>
                </div>
            </div>

            @if ((Auth::user()->tipoPersona->tipo_persona == 'Persona moral') | (Auth::user()->tipoPersona->tipo_persona == 'Moral'))
                <div class="form-group">
                    <label for="razon_social" class="col-form-label text-md-right">{{ __('Razón social') }}</label>
                    <div class="">
                        <label class="form-control " name="razon_social">{{ Auth::user()->razon_social }}</label>
                    </div>
                </div>
                <h6 class="form-group mt-2">Representante legal</h6>
            @endif

        </div>

        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@endsection
