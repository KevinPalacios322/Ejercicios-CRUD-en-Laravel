# Ejercicio 5 - Control de tareas

Aplicación Laravel independiente para el control de tareas.

## Instalación

```bash
cd Tareas
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Para MySQL, configure estas variables en `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tareas
DB_USERNAME=root
DB_PASSWORD=
```

Cree la base `tareas` en MySQL y ejecute `php artisan migrate --seed`.

La migración de usuarios crea la tabla `users` con el campo único `usuario`. La
migración de tareas crea `tareas` con sus cinco datos y las marcas de tiempo.

El seeder crea o actualiza la cuenta `admin`, almacena la contraseña `12345678`
con hash y ejecuta la factory de tareas para generar diez registros ficticios.
La factory genera títulos, descripciones, responsables, fechas límite y estados
válidos. Los datos se crean solo al ejecutar los seeders, no al abrir el listado.

## Crear tareas

El formulario permite registrar título, descripción, responsable, fecha límite y
estado. Valida los límites de longitud, exige todos los campos y acepta una fecha
pasada. Conserva los valores válidos si se encuentra otro error y muestra un
mensaje de éxito al regresar al listado.

## Credenciales

- Usuario: `admin`
- Contraseña: `12345678`
