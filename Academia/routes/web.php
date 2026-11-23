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