@unless($requisitos->count() > 0)
    <table class="table table-bordered" width="100%">
        <thead>
            <tr>
                <th></th>
                <th>Requisito</th>
                <th>Requerido</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td colspan="9" style="text-align: center;"> Sin resultados </td>
            </tr>
        </tbody>
    </table>
@else
    <table class="table table-bordered table-striped datatable">
        <thead>
            <tr>
                <th>#</th>
                <th>Requisito</th>
                <th>Requerido</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($requisitos as $requisito)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td>{{ $requisito->nombre }}</td>
                    @if ($requisito->requerido)
                        <td>Requerido</td>
                    @else
                        <td>No requerido</td>
                    @endif
                    <td class="d-flex justify-content-around">
                        <a href="#" class="">
                            <a href="" id="editRequisito" data-toggle="modal" data-target='#editRequisitoModal'
                                data-id="{{ $requisito->id }}" data-name="{{ $requisito->nombre }}"
                                data-requerido="{{ $requisito->requerido }}">
                                <i class="fas fa-edit text-dark d-inline-block"></i>
                            </a>
                        </a>
                        <a onclick="deleteRequisito({{ $requisito->id }})" href="javascript:;">
                            <i class="fas fa-trash-alt text-danger d-inline-block"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endunless
