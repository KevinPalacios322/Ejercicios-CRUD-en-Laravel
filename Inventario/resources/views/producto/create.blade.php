<form action="{{route('producto.store')}}" method="post">

            
    @csrf

    <label for="codigo">Código</label>
    <input type="text" name="codigo" id="codigo" value="{{ old('codigo') }}" required>
    @error('codigo')
        <p>{{ $message }}</p>
    @enderror

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
    @error('nombre')
        <p>{{ $message }}</p>
    @enderror

    <label for="precio">Precio</label>
    <input type="number" name="precio" id="precio" value="{{ old('precio') }}" min="0" step="0.01" required>
    @error('precio')
        <p>{{ $message }}</p>
    @enderror

    <label for="existencia">Existencia</label>
    <input type="number" name="existencia" id="existencia" value="{{ old('existencia') }}" min="0" required>
    @error('existencia')
        <p>{{ $message }}</p>
    @enderror

    <button type="submit">Crear Producto</button>



</form>
