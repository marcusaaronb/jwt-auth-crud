<?php

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

Route::post('login', 'AuthController@login');

Route::group(['middleware' => 'jwt.auth', 'prefix' => 'auth'], function () {

    // jwt authentication
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    Route::group(['middleware' => 'MasterMiddleware', 'prefix' => 'master'], function () {
        // all master route
    });

    Route::group(['middleware' => 'AdminMiddleware', 'prefix' => 'master'], function () {
        // all master route
    });

});
