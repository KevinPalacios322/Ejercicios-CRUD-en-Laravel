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
            <th>ID </th>
            <th>Código </th>
            <th>Título </th>
            <th>Autor </th>
            <th>Año de Publicación </th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($libros as $libro)
            <tr>
                <td>{{ $libro->id }} </td>
                <td>{{ $libro->codigo }} </td>
                <td>{{ $libro->titulo }} </td>
                <td>{{ $libro->autor }} </td>
                <td>{{ $libro->anio_publicacion }} </td>
                <td>
                    <a href="{{ route('libros.actualizar_libro', ['id' => $libro->id]) }}">Actualizar</a>
                </td>
                <td>
                   <form action="{{ route('libros.eliminar_libro', ['id' => $libro->id]) }}" method="POST" onsubmit="return confirm('¿Querés eliminar este libro?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>