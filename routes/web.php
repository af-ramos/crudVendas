<?php

use App\Http\Controllers\RedirectController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/redirect', RedirectController::class . '@redirect')->name('redirect');
Route::get('/index', RedirectController::class . '@index')->name('index');
Route::get('/', function () {
    return view('login');
});

Route::prefix('usuarios')->group(function () {
    Route::get('/mostrar', UsuarioController::class . '@mostrar')->name('usuarios.mostrar');
    Route::post('/criar', UsuarioController::class . '@criar')->name('usuarios.criar');
    Route::get('/telaAtualizar/{id}', UsuarioController::class . '@telaAtualizar')->name('usuarios.telaAtualizar');
    Route::put('/atualizar/{id}', UsuarioController::class . '@atualizar')->name('usuarios.atualizar');
});