<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('admin/investimentos', 'InvestimentController@parser')->name('admin.investimentos.parser');
Route::resource('admin/investimentos', 'InvestimentController', ['except' => ['store']]);
Route::resource('admin/categorias', 'CategoryController');
Route::resource('admin/cidades', 'CityController');
Route::resource('admin/tags', 'KeywordController');
