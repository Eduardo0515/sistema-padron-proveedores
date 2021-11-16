@if (count($comentarios) > 0)
    <div class="overflow-auto border border-secondary rounded p-2" style="height: 150px">
        @foreach ($comentarios as $comentario)
            <small>{{ $comentario->created_at->format('d-m-Y') }}</small>
            <p>{{ $comentario->comentario }}</p>
        @endforeach
    </div>
@else
    <p>No se ha enviado comentarios.</p>
@endif
