<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TareaController;

Route::get('/', function () {
    return view('login');
})->middleware('guest')->name('login');

Route::post('/', [LoginController::class, 'login'])->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/tareas', [TareaController::class, 'index'])
    ->middleware('auth')
    ->name('tareas');

Route::get('/tareas/create', [TareaController::class, 'create'])
    ->middleware('auth')
    ->name('tareas.create');

Route::post('/tareas', [TareaController::class, 'store'])
    ->middleware('auth')
    ->name('tareas.store');
