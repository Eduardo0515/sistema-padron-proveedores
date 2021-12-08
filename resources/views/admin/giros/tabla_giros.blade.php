@unless($giros->count() > 0)
    <table class="table table-bordered" width="100%">
        <thead>
            <tr>
                <th></th>
                <th>Giro</th>
                <th>Código</th>
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
                <th></th>
                <th>Giro</th>
                <th>Código</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($giros as $giro)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td>{{ $giro->nombre }}</td>
                    <td>{{ $giro->codigo }}</td>
                    <td class="d-flex justify-content-around">
                        <a href="#" class="">
                            <a href="" id="editGiro" data-toggle="modal" data-target='#editGiroModal'
                                data-id="{{ $giro->id }}" data-name="{{ $giro->nombre }}"
                                data-codigo="{{ $giro->codigo }}">
                                <i class="fas fa-edit text-dark d-inline-block"></i>
                            </a>
                        </a>
                        <a onclick="deleteGiro({{ $giro->id }})" href="javascript:;">
                            <i class="fas fa-trash-alt text-danger d-inline-block"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endunless
