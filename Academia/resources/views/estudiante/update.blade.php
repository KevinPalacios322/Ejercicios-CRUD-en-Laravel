<h1>Actualizar Estudiante</h1>

<form action="{{ route('estudiante.update', $estudiante->id) }}" method="POST">
@csrf 
@method('PUT')

<label for="numero_cuenta">Numero de Cuenta</label>
<input type="text" name="numero_cuenta" id="numero_cuenta" value={{ $estudiante->numero_cuenta }}>

<label for="nombre">Nombre</label>
<input type="text" name="nombre" id="nombre" value={{ $estudiante->nombre }}>

<label for="correo">Correo</label>
<input type="email" name="correo" id="correo" value={{ $estudiante->correo }}>

<label for="fecha_nacimiento">Fecha de Nacimiento</label>
<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value={{ $estudiante->fecha_nacimiento }}>

<button type="submit">Actualizar Estudiante</button>
</form>

<button><a href="{{ route('estudiante.index') }}">Volver</a></button>