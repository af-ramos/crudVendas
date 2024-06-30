<?php

use App\Http\Controllers\Pedido;
use App\Http\Controllers\PedidoController;
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

Route::post('/redirecionar', RedirectController::class . '@redirecionar')->name('redirecionar');
Route::get('/index', RedirectController::class . '@index')->name('index');
Route::get('/', function () {
    return view('usuarios.entrar');
})->name('usuarios.entrar');

Route::prefix('usuarios')->group(function () {
    Route::get('/mostrar', UsuarioController::class . '@mostrar')->name('usuarios.mostrar');
    Route::get('/telaCriar', UsuarioController::class . '@telaCriar')->name('usuarios.telaCriar');
    Route::post('/criar', UsuarioController::class . '@criar')->name('usuarios.criar');
    Route::get('/telaAtualizar/{id}', UsuarioController::class . '@telaAtualizar')->name('usuarios.telaAtualizar');
    Route::put('/atualizar/{id}', UsuarioController::class . '@atualizar')->name('usuarios.atualizar');
    Route::get('/sair', UsuarioController::class . '@sair')->name('usuarios.sair');
    Route::delete('/remover/{id}', UsuarioController::class . '@remover')->name('usuarios.remover');
});

Route::prefix('pedidos')->group(function () {
    Route::get('/telaCriar', PedidoController::class . '@telaCriar')->name('pedidos.telaCriar');
    Route::get('/mostrar', PedidoController::class . '@mostrar')->name('pedidos.mostrar');
    Route::post('/criar', PedidoController::class . '@criar')->name('pedidos.criar');
});