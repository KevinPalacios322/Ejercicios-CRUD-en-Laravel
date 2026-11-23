<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso | Clínica Veterinaria</title>
</head>
<body>
    <h1>Clínica Veterinaria</h1>
    <h2>Iniciar sesión</h2>

    <form action="{{ route('log_in') }}" method="POST">
        @csrf

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" value="{{ old('usuario') }}" required autofocus>
        @error('usuario')
            <p role="alert">{{ $message }}</p>
        @enderror

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        @error('password')
            <p role="alert">{{ $message }}</p>
        @enderror

        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>
