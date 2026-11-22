<h1>Desea eliminar el libro "{{ $libro->titulo }}"?</h1>
<form action="{{ route('libros.destruir_libro', ['id' => $libro->id]) }}" method="DELETE">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar</button>
</form>
<button><a href="{{ route('libros.libros') }}">Volver</a></button>