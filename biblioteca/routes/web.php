<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LibroController;




Route::get('/libros/libros',[LibroController::class, 'index'])->middleware('auth') -> name('libros.libros'  );
Route::get('/libros/crear_libro',[LibroController::class, 'create'])->middleware('auth');
Route::post('/libros/crear_libro',[LibroController::class, 'store'])->middleware('auth');


Route::get('/', [LoginController::class, 'MostrarLogin'])->name('login');
Route::post('/login', [LoginController::class, 'iniciarSesion']);
Route::post('/logout', [LoginController::class, 'cerrarSesion']);

