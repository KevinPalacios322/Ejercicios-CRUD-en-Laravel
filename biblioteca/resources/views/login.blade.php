<form action="{{ url('/login') }}" method="POST">
    @csrf
    <label for="usuario">Usuario</label>
    <input type="text" id="usuario" name="usuario" required>

    <label for="password">Contraseña</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Iniciar Sesión</button>
</form>
