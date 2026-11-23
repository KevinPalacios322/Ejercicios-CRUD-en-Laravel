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
