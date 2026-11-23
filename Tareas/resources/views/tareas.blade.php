<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de tareas</title>
</head>
<body>
    <h1>Control de tareas</h1>
    <p>Sesión iniciada como {{ auth()->user()->usuario }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>

    <p><a href="{{ route('tareas.create') }}">Crear tarea</a></p>

    @if (session('success'))
        <p role="status">{{ session('success') }}</p>
    @endif

    @if ($tareas->isEmpty())
        <p>No hay tareas registradas.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Responsable</th>
                    <th>Fecha límite</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tareas as $tarea)
                    <tr>
                        <td>{{ $tarea->id }}</td>
                        <td>{{ $tarea->titulo }}</td>
                        <td>{{ $tarea->descripcion }}</td>
                        <td>{{ $tarea->responsable }}</td>
                        <td>{{ $tarea->fecha_limite->format('d/m/Y') }}</td>
                        <td>{{ ucfirst($tarea->estado) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
