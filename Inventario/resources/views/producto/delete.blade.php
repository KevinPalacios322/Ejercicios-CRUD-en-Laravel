<h1>¿Estás seguro de que quieres eliminar este producto?</h1>
<form action="{{ route('producto.destroy', $producto->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit">Eliminar Producto</button>
    <a href="{{ route('producto') }}">Cancelar</a>
</form>