<h1>Login</h1>

<form action="{{ route('log_in') }}" method="POST">

    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario">

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password">

    <button type="submit">Iniciar sesión</button>
</form>