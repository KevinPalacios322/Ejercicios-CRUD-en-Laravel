<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de tareas</title>
</head>
<body>
    <h1>Control de tareas</h1>
    <p>Sesión iniciada como {{ auth()->user()->usuario }}.</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>
