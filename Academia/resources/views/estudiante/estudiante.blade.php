<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Cerrar Sesión</button>
</form>

<h1>Estudiantes</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Numero de cuenta</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Fecha de nacimiento</th>
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
            </tr>
        @endforeach
    </tbody>
</table>
