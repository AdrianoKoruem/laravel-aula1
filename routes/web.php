<?php

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\cliente;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

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

Route::prefix('dashboard')->group(function () {

    Route::get('/', [UserController::class, 'index'])->name('dashboard.index');
});

Route::prefix('produtos')->group(function () {

    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');

    // create
    Route::get('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');

    // update
    Route::get('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    Route::put('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');

    // delete
    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');
});

Route::prefix('vendas')->group(function () {

    Route::get('/', [VendaController::class, 'index'])->name('vendas.index');

    // create
    Route::get('/cadastrarVendas', [VendaController::class, 'cadastrarVendas'])->name('cadastrar.venda');
    Route::post('/cadastrarVendas', [VendaController::class, 'cadastrarVendas'])->name('cadastrar.venda');

    Route::get('/enviaComprovantePorEmail//{id}', [VendaController::class, 'enviaComprovantePorEmail'])->name('enviaComprovantePorEmail.venda');
});

Route::prefix('clientes')->group(function () {

    Route::get('/', [ClientesController::class, 'index'])->name('cliente.index');

    // create
    Route::get('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');

    // update
    Route::get('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    Route::put('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');

    // delete
    Route::delete('/delete', [ClientesController::class, 'delete'])->name('cliente.delete');
});

Route::prefix('user')->group(function () {

    Route::get('/', [UserController::class, 'index'])->name('user.index');

    // create
    Route::get('/cadastrarUser', [UserController::class, 'cadastrarUser'])->name('cadastrar.user');
    Route::post('/cadastrarUser', [UserController::class, 'cadastrarUser'])->name('cadastrar.user');

    // update
    Route::get('/atualizarUser/{id}', [UserController::class, 'atualizarUser'])->name('atualizar.user');
    Route::put('/atualizarUser/{id}', [UserController::class, 'atualizarUser'])->name('atualizar.user');

    // delete
    Route::delete('/delete', [UserController::class, 'delete'])->name('user.delete');
});



// Route::resource('clientes', ClientesController::class);