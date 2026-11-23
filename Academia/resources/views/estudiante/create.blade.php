<h1>Crear Estudiante</h1>

<form action="{{ route('estudiante.store') }}" method="POST">
@csrf 

<label for="numero_cuenta">Numero de Cuenta</label>
<input type="text" name="numero_cuenta" id="numero_cuenta">

<label for="nombre">Nombre</label>
<input type="text" name="nombre" id="nombre">

<label for="correo">Correo</label>
<input type="email" name="correo" id="correo">

<label for="fecha_nacimiento">Fecha de Nacimiento</label>
<input type="date" name="fecha_nacimiento" id="fecha_nacimiento">

<button type="submit">Crear Estudiante</button>
</form>