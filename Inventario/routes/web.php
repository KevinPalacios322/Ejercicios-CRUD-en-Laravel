<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('login');
});
Route::post ('/', [LoginController::class, 'login']) -> name('login');
Route::get('/logout', [LoginController::class, 'logout']) -> name('logout');

Route::get ('/producto',[ProductoController::class, 'index']) -> name('producto') -> middleware('auth');