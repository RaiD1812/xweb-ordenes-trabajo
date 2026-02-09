<h1>Órdenes de Trabajo</h1>

<a href="/ot/crear">➕ Crear nueva OT</a>

<hr>

@foreach ($ordenes as $ot)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <strong>Cliente:</strong> {{ $ot->cliente }} <br>
        <strong>Equipo:</strong> {{ $ot->equipo }} <br>
        <strong>Problema:</strong> {{ $ot->problema }} <br>
        <strong>Técnico:</strong> {{ $ot->tecnico }} <br>
        <strong>Estado:</strong> {{ $ot->estado }} <br>
        <strong>Obs:</strong> {{ $ot->observaciones }} <br><br>

        <a href="/ot/{{ $ot->id }}/editar">✏️ Editar</a>

        <form action="/ot/{{ $ot->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">🗑️ Eliminar</button>
        </form>
    </div>
@endforeach

