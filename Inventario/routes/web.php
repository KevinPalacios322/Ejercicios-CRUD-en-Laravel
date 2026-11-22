<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('login');
});
Route::post ('/', [LoginController::class, 'login']) -> name('login');
Route::get('/logout', [LoginController::class, 'logout']) -> name('logout');

Route::get ('/producto', function () {
    return view('producto.producto');
})->middleware('auth') -> name('producto');