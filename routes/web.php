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
    return view('auth.login');
});
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::resource('/medicos', 'MedicosController');
Route::get('/medicos/delete/{id}', ['as' => 'medicos.delete', 'uses' => 'MedicosController@destroy']);

Route::resource('/pacientes', 'PacientesController');
Route::get('/pacientes/delete/{id}', ['as' => 'pacientes.delete', 'uses' => 'PacientesController@destroy']);

Route::resource('/agendamentos', 'AgendamentosController');
Route::get('/agendamentos/delete/{id}', ['as' => 'agendamentos.delete', 'uses' => 'AgendamentosController@destroy']);

Route::resource('/usuarios', 'UsuariosController');
Route::get('/usuarios/delete/{id}', ['as' => 'usuarios.delete', 'uses' => 'UsuariosController@destroy']);