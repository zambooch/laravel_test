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

Route::get('/', 'MessageController@index');

Route::post('ulogin', 'UloginController@login');

Route::auth();

// Маршруты аутентификации...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Маршруты регистрации...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::post('/message/store', 'MessageController@store');
Route::post('/message/destroy', 'MessageController@destroy');
Route::post('/message/update', 'MessageController@update');
Route::post('/message/update-form', 'MessageController@updateForm');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/records', function () {
    $records = \App\Record::all();
    return view('records', compact('records'));
});