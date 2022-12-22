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

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/equipamento', 'EquipamentosController')->except([
    'show', 'edit'
]);

Route::get('/equipamento/delete/{equipamento}', function (App\Models\Equipamento $equipamento) {
    if (!session()->has('redirect_to')) {
        session(['redirect_to' => url()->previous()]);
    }
    return view('equipamentos.destroy', ['eqp' => $equipamento]);
})->name('equipamento.delete');

Route::get('/equipamento/edit/{equipamento}', function (App\Models\Equipamento $equipamento) {
    if (!session()->has('redirect_to')) {
        session(['redirect_to' => url()->previous()]);
    }
    return view('equipamentos.edit', ['eqp' => $equipamento]);
})->name('equipamento.edit');

Route::resource('/setor', 'SetoresController')->except([
    'show', 'edit'
]);

Route::get('/setor/delete/{setor}', function (App\Models\Setor $setor) {
    if (!session()->has('redirect_to')) {
        session(['redirect_to' => url()->previous()]);
    }
    return view('setores.destroy', ['setor' => $setor]);
})->name('setor.delete');

Route::get('/setor/edit/{setor}', function (App\Models\Setor $setor) {
    if (!session()->has('redirect_to')) {
        session(['redirect_to' => url()->previous()]);
    }
    return view('setores.edit', ['setor' => $setor]);
})->name('setor.edit');
