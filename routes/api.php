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

Route::group(['prefix' => 'v1'], function(){

    Route::group(['namespace' => 'Api\Auth'], function() {
        Route::post('login', 'LoginController@login');
    });
    
    Route::group(['namespace' => 'Api', 'middleware' => 'auth:sanctum'], function(){
        Route::get('articles', 'ArticleController@index');    
    });

});