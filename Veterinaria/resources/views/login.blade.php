<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso | Clínica Veterinaria</title>
</head>
<body>
    <main>
        <h1>Clínica Veterinaria</h1>
        <h2>Iniciar sesión</h2>

        <form action="{{ route('login.store') }}" method="POST">
            @csrf

            <label for="usuario">Usuario</label>
            <input id="usuario" name="usuario" type="text" value="{{ old('usuario') }}" required autofocus>
            @error('usuario')
                <p role="alert">{{ $message }}</p>
            @enderror

            <label for="password">Contraseña</label>
            <input id="password" name="password" type="password" required>
            @error('password')
                <p role="alert">{{ $message }}</p>
            @enderror

            <button type="submit">Ingresar</button>
        </form>
    </main>
</body>
</html>
