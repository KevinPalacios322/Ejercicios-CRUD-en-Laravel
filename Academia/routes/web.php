<?php

use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('log_in');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::view('/veterinaria', 'veterinaria.dashboard')
    ->middleware('auth')
    ->name('veterinaria.dashboard');

Route::get('/estudiante/estudiante', [EstudianteController::class, 'index'])->name('estudiante.index');
Route::get('/estudiante/create', [EstudianteController::class, 'create'])->name('estudiante.create');
Route::post('/estudiante/store', [EstudianteController::class, 'store'])->name('estudiante.store');

Route::get('/estudiante/edit/{id}', [EstudianteController::class, 'edit'])->name('estudiante.edit');
Route::put('/estudiante/update/{id}', [EstudianteController::class, 'update'])->name('estudiante.update');

Route::delete('/estudiante/destroy/{id}', [EstudianteController::class, 'destroy'])->name('estudiante.destroy');
