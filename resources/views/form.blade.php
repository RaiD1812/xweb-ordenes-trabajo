<h1>Formulario de prueba</h1>

<form method="POST" action="/guardar">
    @csrf

    <input type="text" name="nombre" placeholder="Tu nombre">
    <br><br>

    <button type="submit">Guardar</button>
</form>
