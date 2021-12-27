<?php

use App\Http\Controllers\TipoClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/planos', [TipoClienteController::class, 'index']);
Route::post('/planos/listar', [TipoClienteController::class, 'listar']);
Route::get('/cidades', [CidadesController::class, 'index']);
Route::post('/cidades/listar', [CidadesController::class, 'listar']);
Route::post('/cidades/editar/', [CidadesController::class, 'editar']); 
Route::post('/cidades/excluir/', [CidadesController::class, 'excluir']); 