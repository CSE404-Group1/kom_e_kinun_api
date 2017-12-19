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
// USER ROUTES
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', 'RegisterController@register');

// ITEM ROUTES
Route::group(['prefix' => 'items'], function(){
  // GET ITEMS
  Route::get('/','ItemController@index');
  Route::get('/oldfirst','ItemController@oldfirst');
  Route::get('/pricelimit/{min?}/{max?}',['uses' => 'ItemController@pricelimit']);

  Route::get('/seller/{id}', 'ItemController@indexbyseller');

  // GET SINGLE ITEM
  Route::get('/{id}','ItemController@show');

  // ADD ITEM
  Route::post('/','ItemController@store')->middleware('auth:api');

  // ADD ITEM IMAGE
  Route::post('/img/{itemid}','ItemController@storeitemimage')->middleware('cors');

  // UPDATE ITEM
  Route::post('/{id}/edit','ItemController@update')->middleware('auth:api');

  // DELETE ITEM
  Route::delete('/{id}','ItemController@destroy')->middleware('auth:api');
});
