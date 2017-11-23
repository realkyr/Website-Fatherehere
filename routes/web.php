<?php

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
    return view('home');
});

Route::get('/article', function () {
    return view('article');
});

Route::get('/article_1', function () {
    return view('article_1');
});

Route::get('/article_2', function () {
    return view('article_2');
});

Route::get('/article_3', function () {
    return view('article_3');
});

Route::get('/article_4', function () {
    return view('article_4');
});

Route::get('/', 'CaloriesController@count');
Route::get('/calories', 'CaloriesController@index');
Route::post('/calories', 'CaloriesController@store');
Route::get('/result/{id}', 'CaloriesController@show');
Route::get('/count', 'HomeController@amount');