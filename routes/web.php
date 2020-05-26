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

//
Route::resource('/professores', 'ProfessorController')->parameters([
    'professores' => 'professor'
])->middleware('auth');
Route::resource('/disciplinas','DisciplinaController')->middleware('auth');
Route::resource('/departamentos','DepartamentoController')->middleware('auth');
Route::resource('/departamentosprofessores','DepartamentoProfessorController')->parameters([
    'departamentosprofessores' => 'departamentoProfessor'
])->middleware('auth');
Route::resource('/cidades','CidadeController')->middleware('auth');
Route::resource('/cursos','CursoController')->middleware('auth');
Route::resource('/conteudos','ConteudoController')->middleware('professor');
