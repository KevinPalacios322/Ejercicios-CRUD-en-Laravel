<h1>Productos</h1>

<button><a href="{{ route('logout') }}">Cerrar sesión</a></button>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Existencia</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($libros as $libro)
            <tr>
                <td>{{ $libro->id }}</td>
                <td>{{ $libro->codigo }}</td>
                <td>{{ $libro->nombre }}</td>
                <td>${{ $libro->precio }}</td>
                <td>{{ $libro->existencia }}</td>
            </tr>
        @endforeach
    </tbody>
</table>