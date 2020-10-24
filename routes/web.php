<?php

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
    return view('welcome');
});
Route::resource('/equipamento', 'EquipamentosController')->except([
    'show', 'edit'
]);
Route::get('/equipamento/delete/{equipamento}', function (App\Models\Equipamento $equipamento) {
	return view('equipamentos.destroy', ['eqp' => $equipamento]);
})->name('equipamento.delete');
Route::get('/equipamento/edit/{equipamento}', function (App\Models\Equipamento $equipamento) {
	return view('equipamentos.edit', ['eqp' => $equipamento]);
})->name('equipamento.edit');
