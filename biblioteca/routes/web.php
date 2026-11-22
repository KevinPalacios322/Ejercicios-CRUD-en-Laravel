<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LibroController;




Route::get('/libros',[LibroController::class, 'index'])->middleware('auth');

Route::get('/', [LoginController::class, 'MostrarLogin'])->name('login');
Route::post('/login', [LoginController::class, 'iniciarSesion']);
Route::post('/logout', [LoginController::class, 'cerrarSesion']);

