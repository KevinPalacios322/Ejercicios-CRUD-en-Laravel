<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;




Route::get('/libros', function () {
    return view('libros');
})->middleware('auth');

Route::get('/', [LoginController::class, 'MostrarLogin'])->name('login');
Route::post('/login', [LoginController::class, 'iniciarSesion']);
Route::post('/logout', [LoginController::class, 'cerrarSesion']);

