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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'ticket'], function(){
    Route::get('/', 'TicketController@index');
    Route::post('/store', 'TicketController@store');
    Route::post('/check-in', 'TicketController@checkIn');
    Route::post('/delete/{id}', 'TicketController@delete');
    Route::post('/update/{id}', 'TicketController@update');
    Route::post('/find/{id}', 'TicketController@show');
    Route::post('/approve/{id}', 'TicketController@approve');
});
