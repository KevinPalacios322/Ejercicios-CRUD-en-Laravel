<h1>Productos</h1>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<button><a href="{{ route('logout') }}">Cerrar sesión</a></button>

<button><a href="{{ route('producto.create') }}">Agregar Producto</a></button>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Existencia</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->codigo }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>${{ $producto->precio }}</td>
                <td>{{ $producto->existencia }}</td>
                <td>
                    <a href="{{ route('producto.edit', $producto->id) }}">Editar</a>
                    <form action="{{ route('producto.delete', $producto->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
