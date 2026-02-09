<h1>Crear Orden de Trabajo</h1>

<form action="/ot" method="POST">
    @csrf

    <label>Cliente:</label><br>
    <input type="text" name="cliente" required><br><br>

    <label>Equipo:</label><br>
    <input type="text" name="equipo" required><br><br>

    <label>Problema:</label><br>
    <textarea name="problema" required></textarea><br><br>

    <label>Técnico:</label><br>
    <input type="text" name="tecnico" required><br><br>

    <label>Observaciones:</label><br>
    <textarea name="observaciones"></textarea><br><br>

    <button type="submit">Guardar OT</button>
</form>
