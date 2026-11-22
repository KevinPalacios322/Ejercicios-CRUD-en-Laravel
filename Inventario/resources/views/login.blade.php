<h1>Login</h1>


<form action="{{ route('login') }}" method="POST">

    @csrf 

    <label for="usuario">Usuario:</label>
    <input type="usuario" name="usuario" id="usuario" required>

    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Iniciar sesión</button>


</form>