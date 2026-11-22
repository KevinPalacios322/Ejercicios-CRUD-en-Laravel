<h1>Editar Libro</h1>

<form action="{{ route('libros.guardar_libro', ['id' => $libro->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="codigo">Código:</label>
    <input type="text" name="codigo" value="{{ $libro->codigo }}" required><br>

    <label for="titulo">Título:</label>
    <input type="text" name="titulo" value="{{ $libro->titulo }}" required><br>

    <label for="autor">Autor:</label>
    <input type="text" name="autor" value="{{ $libro->autor }}" required><br>

    <label for="anio_publicacion">Año de Publicación:</label>
    <input type="number" name="anio_publicacion" value="{{ $libro->anio_publicacion }}" required><br>

    <button type="submit">Guardar Cambios</button>
    
</form>
<button><a href="{{ route('libros.libros') }}">Volver</a></button>