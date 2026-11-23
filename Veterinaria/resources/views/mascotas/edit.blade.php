<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar mascota | Clínica Veterinaria</title>
</head>
<body>
    <main>
        <h1>Actualizar mascota</h1>

        @if ($errors->any())
            <ul role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('mascotas.update', $mascota) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="codigo">Código</label>
            <input id="codigo" name="codigo" type="text" value="{{ old('codigo', $mascota->codigo) }}" required>
            @error('codigo')
                <p role="alert">{{ $message }}</p>
            @enderror

            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text" value="{{ old('nombre', $mascota->nombre) }}" maxlength="80" required>
            @error('nombre')
                <p role="alert">{{ $message }}</p>
            @enderror

            <label for="especie">Especie</label>
            <select id="especie" name="especie" required>
                @foreach (['perro' => 'Perro', 'gato' => 'Gato', 'otro' => 'Otro'] as $valor => $etiqueta)
                    <option value="{{ $valor }}" @selected(old('especie', $mascota->especie) === $valor)>{{ $etiqueta }}</option>
                @endforeach
            </select>
            @error('especie')
                <p role="alert">{{ $message }}</p>
            @enderror

            <label for="propietario">Propietario</label>
            <input id="propietario" name="propietario" type="text" value="{{ old('propietario', $mascota->propietario) }}" maxlength="100" required>
            @error('propietario')
                <p role="alert">{{ $message }}</p>
            @enderror

            <label for="fecha_nacimiento">Fecha de nacimiento</label>
            <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" value="{{ old('fecha_nacimiento', $mascota->fecha_nacimiento->toDateString()) }}" max="{{ now()->toDateString() }}" required>
            @error('fecha_nacimiento')
                <p role="alert">{{ $message }}</p>
            @enderror

            <button type="submit">Guardar cambios</button>
        </form>

        <a href="{{ route('mascotas.index') }}">Cancelar</a>
    </main>
</body>
</html>
