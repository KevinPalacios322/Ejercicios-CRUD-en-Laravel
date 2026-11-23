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

La migración crea la tabla `users` con el campo único `usuario`. El seeder crea o
actualiza la cuenta `admin` y almacena la contraseña `12345678` con hash.

## Credenciales

- Usuario: `admin`
- Contraseña: `12345678`
