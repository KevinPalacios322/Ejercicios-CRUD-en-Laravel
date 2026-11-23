<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MascotaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::view('/veterinaria', 'dashboard')
    ->middleware('auth')
    ->name('veterinaria.dashboard');

Route::get('/mascotas', [MascotaController::class, 'index'])
    ->middleware('auth')
    ->name('mascotas.index');

Route::get('/mascotas/crear', [MascotaController::class, 'create'])
    ->middleware('auth')
    ->name('mascotas.create');

Route::post('/mascotas', [MascotaController::class, 'store'])
    ->middleware('auth')
    ->name('mascotas.store');

Route::get('/mascotas/{mascota}/editar', [MascotaController::class, 'edit'])
    ->middleware('auth')
    ->name('mascotas.edit');

Route::put('/mascotas/{mascota}', [MascotaController::class, 'update'])
    ->middleware('auth')
    ->name('mascotas.update');
