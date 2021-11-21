@extends('layouts.admin_lte')

@section('content')

    @include('admin.credencial.credencial_body')

    <div class="form-group row m-3 justify-content-center">
        <div class="">
            <a href="" class="btn btn-success btn-block">
                Generar PDF
            </a>
        </div>

    </div>
@endsection
