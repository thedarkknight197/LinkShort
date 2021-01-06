<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::prefix('/v1')->group(function (){

    Route::get('/user/{email}', 'LinksController@getByEmail');

    // group route api links
    Route::prefix('link')->group(function (){
        Route::get('/', 'LinksController@all');
        Route::post('/add', 'LinksController@store');
        Route::get('/{id}', 'LinksController@show');
        Route::put('/{id}', 'LinksController@update');
        Route::delete('/{id}', 'LinksController@destroy');
    });

    Route::prefix('user')->group(function (){
        // Route::get('/', '');
        // Route::post('/add', '@store');
        // Route::get('/{id}', '@show');
        Route::put('/{id}', 'UserController@update');
        // Route::delete('/{id}', '@destroy');
    });

});
