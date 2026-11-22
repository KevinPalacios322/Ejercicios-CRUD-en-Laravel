<h1>Crear Libro</h1>

<form action="{{ url('libros/crear_libro') }}" method="POST">
    @csrf

    <label for="codigo">Código:</label>
    <input type="text" name="codigo" id="codigo" required><br>

    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" required><br>

    <label for="autor">Autor:</label>
    <input type="text" name="autor" id="autor" required><br>

    <label for="anio_publicacion">Año de Publicación:</label>
    <input type="number" name="anio_publicacion" id="anio_publicacion" required><br>

    <button type="submit">Guardar</button>