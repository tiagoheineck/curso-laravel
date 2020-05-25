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

Route::resource('/disciplinas','DisciplinaController')
  ->middleware(['auth', 'can:admin']);//if user is logged, he can access the pages


Route::resource('/professores','ProfessorController')
  ->parameters(['professores' => 'professor']);//errors on plurals

Route::resource('/departamentos','DepartamentoController');

Route::resource('/conteudos','ConteudoController')
  ->middleware(['auth', 'can:professor']);//if user is logged, he can access the pages;
