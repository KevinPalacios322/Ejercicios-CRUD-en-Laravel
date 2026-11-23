<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear tarea</title>
</head>
<body>
    <h1>Crear tarea</h1>

    @if ($errors->any())
        <div role="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('tareas.store') }}">
        @csrf

        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" maxlength="150" required>
        @error('titulo') <p>{{ $message }}</p> @enderror

        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion" maxlength="500" required>{{ old('descripcion') }}</textarea>
        @error('descripcion') <p>{{ $message }}</p> @enderror

        <label for="responsable">Responsable</label>
        <input type="text" id="responsable" name="responsable" value="{{ old('responsable') }}" maxlength="100" required>
        @error('responsable') <p>{{ $message }}</p> @enderror

        <label for="fecha_limite">Fecha límite</label>
        <input type="date" id="fecha_limite" name="fecha_limite" value="{{ old('fecha_limite') }}" required>
        @error('fecha_limite') <p>{{ $message }}</p> @enderror

        <label for="estado">Estado</label>
        <select id="estado" name="estado" required>
            <option value="">Seleccione un estado</option>
            <option value="pendiente" @selected(old('estado') === 'pendiente')>Pendiente</option>
            <option value="en proceso" @selected(old('estado') === 'en proceso')>En proceso</option>
            <option value="completada" @selected(old('estado') === 'completada')>Completada</option>
        </select>
        @error('estado') <p>{{ $message }}</p> @enderror

        <button type="submit">Crear tarea</button>
        <a href="{{ route('tareas') }}">Cancelar</a>
    </form>
</body>
</html>
