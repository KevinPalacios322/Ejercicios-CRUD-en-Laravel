<form action="{{ route('producto.update', $producto->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="codigo">Código:</label>
    <input type="text" name="codigo" id="codigo" value="{{ $producto->codigo }}" required>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" required>

    <label for="precio">Precio:</label>
    <input type="number" name="precio" id="precio" value="{{ $producto->precio }}" required>

    <label for="existencia">Existencia:</label>
    <input type="number" name="existencia" id="existencia" value="{{ $producto->existencia }}" required>

    <button type="submit">Actualizar Producto</button>
</form>