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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/disciplinas','DisciplinaController');
Route::resource('/cursos','CursoController');
Route::resource('/cidades','CidadeController');
//Route::resource('/professores','ProfessorController');
Route::resource('/departamentos','DepartamentoController');

Route::resource('professores', 'ProfessorController')->parameters([ //professor eu fiz diferente, pois a pluralização do ingles estava gerando rotas tipo .../profesore
    'professores' => 'professor'
]);
