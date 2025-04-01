<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerCliente;
use App\Http\Controllers\ControllerContato;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ControllerCliente::class, 'index'])->name('clientes.index');

Route::get('/cadastroCliente', [ControllerCliente::class, 'create'])->name('clientes.create');
Route::post('/insertCliente', [ControllerCliente::class, 'store'])->name('clientes.store');
Route::delete('/clientes/{id}', [ControllerCliente::class, 'destroy'])->name('clientes.destroy');
Route::get('/clientes/edit/{id}', [ControllerCliente::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/update/{id}', [ControllerCliente::class, 'update'])->name('clientes.update');
Route::get('/clientes/show/{id}', [ControllerCliente::class, 'show'])->name('clientes.show');


Route::get('/clientes/{idCliente}/contatos/', [ControllerContato::class, 'index'])->name('contatos.index');
Route::get('/clientes/{idCliente}/contatos/create', [ControllerContato::class, 'create'])->name('contatos.create');
Route::post('/clientes/{idCliente}/contatos/store', [ControllerContato::class, 'store'])->name('contatos.store');
Route::delete('/clientes/{idCliente}/contatos/{id}/destroy', [ControllerContato::class, 'destroy'])->name('contatos.destroy');
Route::get('/clientes/{idCliente}/contatos/{id}', [ControllerContato::class,'edit'])->name('contatos.edit');
Route::put('/clientes/{idCliente}/contatos/{id}/update', [ControllerContato::class, 'update'])->name('contatos.update');
Route::get('/clientes/contatos/show/{id}', [ControllerContato::class, 'show'])->name('contatos.show');