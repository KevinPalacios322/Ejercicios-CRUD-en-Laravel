<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar mascota | Clínica Veterinaria</title>
</head>
<body>
    <main>
        <h1>Eliminar mascota</h1>
        <p>¿Desea eliminar a {{ $mascota->nombre }} con código {{ $mascota->codigo }}?</p>

        <form action="{{ route('mascotas.destroy', $mascota) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Sí, eliminar</button>
        </form>

        <a href="{{ route('mascotas.index') }}">Cancelar</a>
    </main>
</body>
</html>
