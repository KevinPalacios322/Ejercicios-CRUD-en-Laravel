<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EstudianteController;

Route::get('/', [App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('log_in');
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::get('/estudiante/estudiante', [EstudianteController::class, 'index'])->name('estudiante.index');
Route::get('/estudiante/create', [EstudianteController::class, 'create'])->name('estudiante.create');
Route::post('/estudiante/store', [EstudianteController::class, 'store'])->name('estudiante.store');

Route::get('/estudiante/edit/{id}', [EstudianteController::class, 'edit'])->name('estudiante.edit');
Route::put('/estudiante/update/{id}', [EstudianteController::class, 'update'])->name('estudiante.update');

Route::delete('/estudiante/destroy/{id}', [EstudianteController::class, 'destroy'])->name('estudiante.destroy');