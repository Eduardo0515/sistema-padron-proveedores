<h4 class="my-4">Padrón</h4>
@if (count($padronResults) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Fecha</th>
                <th scope="col">RFC</th>
                <th scope="col">Correo</th>
                <th scope="col">Tipo persona</th>
                <th scope="col">Razón social / Nombre</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($padronResults as $padron)
                <tr>
                    <td>{{ $padron->created_at->format('d-m-Y') }}</td>
                    <td>{{ $padron->rfc }}</td>
                    <td>{{ $padron->correo }}</td>
                    <td>{{ $padron->tipo_persona }}</td>
                    @if (($padron->tipo_persona == 'Persona moral') | ($padron->tipo_persona == 'Moral'))
                        <td>{{ $padron->razon_social }}</td>
                    @else
                        <td>{{ $padron->nombres }} {{ $padron->apellidos }}</td>
                    @endif
                    <td> <a href="{{ route('admin.verpadron', $padron->id) }}" class="text-danger">Ver
                            datos</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $padronResults->links() }}
@else
    <div class="card">
        <div class="card-header">
            Datos filtrados
        </div>
        <div class="card-body">
            <p class="card-text">No se ha encontrado resultados.</p>
        </div>
    </div>

@endif
