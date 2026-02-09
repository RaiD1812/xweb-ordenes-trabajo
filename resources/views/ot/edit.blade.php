<h1>Editar Orden</h1>

<form action="/ot/{{ $ot->id }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="cliente" value="{{ $ot->cliente }}" placeholder="Cliente" required><br><br>

    <input type="text" name="equipo" value="{{ $ot->equipo }}" placeholder="Equipo" required><br><br>

    <textarea name="problema" placeholder="Problema">{{ $ot->problema }}</textarea><br><br>

    <input type="text" name="tecnico" value="{{ $ot->tecnico }}" placeholder="Técnico"><br><br>

    <select name="estado">
        <option value="Pendiente" {{ $ot->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option value="En proceso" {{ $ot->estado == 'En proceso' ? 'selected' : '' }}>En proceso</option>
        <option value="Terminado" {{ $ot->estado == 'Terminado' ? 'selected' : '' }}>Terminado</option>
    </select><br><br>

    <textarea name="observaciones" placeholder="Observaciones">{{ $ot->observaciones }}</textarea><br><br>

    <button type="submit">💾 Actualizar</button>
</form>
