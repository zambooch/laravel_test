<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');


Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/anonymrecord', function (Request $request) {
    // Создаем новую запись рекорда
    $record = new \App\Record();
    // Добавляем результат
    $record->score = $request->get('score');
    // Сохраняем запись
    $record->save();
    // Возвращаем сообщение
    return response()->json([
        'message' => 'Рекорд добавлен!',
    ], 201);
});

Route::post('/record', function (Request $request) {
    // Создаем новую запись рекорда
    $record = new \App\Record();
    // Добавляем результат
    $record->score = $request->get('score');
    // Если запись добавил авторизированный пользователь, указываем его
    $record->user_id = \Auth::id();
    // Сохраняем запись
    $record->save();
    // Возвращаем сообщение
    return response()->json([
        'message' => 'Пользователь '. \Auth::user()->name .' добавил рекорд!',
    ], 201);
})->middleware('auth:api');
