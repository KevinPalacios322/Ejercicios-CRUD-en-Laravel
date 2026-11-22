<form action="{{ url('/logout') }}" method="POST">
    @csrf
    <button type="submit">Cerrar Sesión</button>
</form>

<button>
    <a href="{{ url('libros/crear_libro') }}">Crear Libro</a>
</button>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Año de Publicación</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($libros as $libro)
            <tr>
                <td>{{ $libro->id }}</td>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->anio_publicacion }}</td>
            </tr>
        @endforeach
    </tbody>