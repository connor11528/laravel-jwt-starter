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

Route::prefix('auth')->group(function(){
    // Registration Routes...
    Route::post('register', 'RegisterController@register');

    // JWT Routes
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::middleware('auth:api')->group(function () {
    Route::ApiResource('tasks', 'TasksController');
    Route::delete('tasks', 'TasksController@deleteCompletedTasks');
});

Route::apiResource('companies', 'CompanyController');
