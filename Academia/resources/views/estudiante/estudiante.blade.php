<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Cerrar Sesión</button>
</form>

<h1>Estudiantes</h1>

<button><a href="{{ route('estudiante.create') }}">Crear Estudiante</a></button>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Numero de cuenta</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Fecha de nacimiento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($estudiantes as $estudiante)
            <tr>
                <td>{{ $estudiante->id }}</td>
                <td>{{ $estudiante->numero_cuenta }}</td>
                <td>{{ $estudiante->nombre }}</td>
                <td>{{ $estudiante->correo }}</td>
                <td>{{ $estudiante->fecha_nacimiento }}</td>
                <td>
                    <a href="{{ route('estudiante.edit', $estudiante->id) }}">Editar</a>
                    <form action="{{ route('estudiante.destroy', $estudiante->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este estudiante?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
