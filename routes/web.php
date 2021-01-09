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

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'HomeController@manageLinks')->name('home');
    Route::get('/manage-profile', 'HomeController@manageProfile')->name('manageProfile');
});

Route::get('/{username}', 'PublicUserController')->name('publicUserView');
