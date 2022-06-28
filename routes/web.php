<?php

use App\Http\Controllers\Api\ProyectosController;
use Illuminate\Support\Facades\Route;
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
    return view('app');
});

Auth::routes();

Route::post('/LoginVue', [App\Http\Controllers\LoginController::class, 'login']);
Route::post('/RegisterVue', [App\Http\Controllers\LoginController::class, 'register']);
Route::get('/proyectos', [ProyectosController::class, 'index']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/categorias', [App\Http\Controllers\CategoriaController::class, 'index']);
//Route::get('/categorias/create', [App\Http\Controllers\CategoriaController::class, 'create']);
//Route::post('/categorias/insert', [App\Http\Controllers\CategoriaController::class, 'insert']);
//Route::get('/categorias/{id}/edit', [App\Http\Controllers\CategoriaController::class, 'edit']);
//Route::post('/categorias/update/{id}', [App\Http\Controllers\CategoriaController::class, 'update']);
//Route::post('/categorias/delete/{id}',[App\Http\Controllers\CategoriaController::class, 'delete']);

// DESARROLLADOR
//Route::get('/desarrollador', [App\Http\Controllers\DesarrolladorController::class, 'index']);
//Route::get('/desarrollador/exportexcel/', [App\Http\Controllers\DesarrolladorController::class, 'exportexcel']);
//Route::get('/desarrollador/exportpdf/', [App\Http\Controllers\DesarrolladorController::class, 'exportpdf']);

// EMPRESA
//Route::get('/empresa', [App\Http\Controllers\EmpresaController::class, 'index']);
//Route::get('/empresa/exportexcel/', [App\Http\Controllers\EmpresaController::class, 'exportexcel']);
//Route::get('/empresa/exportpdf/', [App\Http\Controllers\EmpresaController::class, 'exportpdf']);
