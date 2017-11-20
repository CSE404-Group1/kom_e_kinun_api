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

Route::post('/register', 'RegisterController@register');

Route::group(['prefix' => 'items'], function(){
  Route::get('/','ItemController@index');
  Route::get('/oldfirst','ItemController@oldfirst');
  Route::get('/pricelimit/{min?}/{max?}',['uses' => 'ItemController@pricelimit']);
  Route::post('/','ItemController@store')->middleware('auth:api');
});
