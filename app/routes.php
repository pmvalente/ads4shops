<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home/principal');
});

Route::get('principal', 'HomeController@principal');

Route::resource('negocio', 'NegociosController', array('except' =>array('show')));
Route::resource('perfil', 'PerfisController', array('except' =>array('show')));
Route::resource('acao', 'AcoesController', array('except' =>array('show')));
Route::resource('anuncio', 'AnunciosController');
Route::resource('utilizador', 'UtilizadoresController');