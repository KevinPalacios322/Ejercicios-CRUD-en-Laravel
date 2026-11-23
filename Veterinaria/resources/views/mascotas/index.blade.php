<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mascotas | Clínica Veterinaria</title>
</head>
<body>
    <main>
        <h1>Registro de mascotas</h1>

        @if (session('success'))
            <p role="status">{{ session('success') }}</p>
        @endif

        <a href="{{ route('mascotas.create') }}">Registrar mascota</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Especie</th>
                    <th>Propietario</th>
                    <th>Fecha de nacimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mascotas as $mascota)
                    <tr>
                        <td>{{ $mascota->id }}</td>
                        <td>{{ $mascota->codigo }}</td>
                        <td>{{ $mascota->nombre }}</td>
                        <td>{{ $mascota->especie }}</td>
                        <td>{{ $mascota->propietario }}</td>
                        <td>{{ $mascota->fecha_nacimiento->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('mascotas.edit', $mascota) }}">Editar</a>
                            <a href="{{ route('mascotas.delete', $mascota) }}">Eliminar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No hay mascotas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </main>
</body>
</html>
