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

Route::get('/', 'webController@webView');

Route::get('admin', 'webController@webAdmin');

Route::any('adminer', '\Aranyasen\LaravelAdminer\AdminerController@index');

Route::group(['prefix' => 'api'], function () {
    Route::get('topics', 'TopicController@index');
    Route::delete('topic/{id}', 'TopicController@destroy');
    Route::post('topic', 'TopicController@create');

    Route::get('ways', 'WayController@index');
    Route::delete('way/{id}', 'WayController@destroy');
    Route::post('way', 'WayController@create');
});
