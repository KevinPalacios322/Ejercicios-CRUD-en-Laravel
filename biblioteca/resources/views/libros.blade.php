<h1>Libros</h1>


<form action="{{ url('/logout') }}" method="POST">
    @csrf
    <button type="submit">Cerrar Sesión</button>
</form>