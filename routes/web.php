<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\algebricoController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\SimplexController;

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

Route::post('/simplex',[SimplexController::class, 'simplex'])->name('simplex');
Route::get('/tabela',[SimplexController::class, 'tabela'])->name('pages.tabela');

Route::get('/', function () {
    return view('pages.variavelrestricao');
})->name('inicio');

Route::get('/variavelrestricao', function () {
    return view('pages.variavelrestricao');
})->name('variavelrestricao');


Route::post('/inicioCalc', [algebricoController::class, 'index'])->name('pages.inicioCalc');

Route::post('/continuaCalc', [algebricoController::class, 'calcular'])->name('pages.continuaCalc');

Route::get('/expenses', [ExpensesController::class, 'index'])->name('index');

Route::fallback(function () {

    echo 'Anota acessada não existe. <a href= "' . route('pages.variavelrestricao') . '">Clique aqui</a> para ir para a página inicial';
});
