<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefasController;

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

Route::post('/novaTarefa', [TarefasController::class, 'novaTarefa']);
Route::get('/deletaTarefa/{id}',[TarefasController::class, 'deletaTarefa']);
Route::get('/editarTarefa/{id}',[TarefasController::class, 'editarTarefa']);
Route::get('/concluirTarefa/{id}',[TarefasController::class, 'concluirTarefa']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
