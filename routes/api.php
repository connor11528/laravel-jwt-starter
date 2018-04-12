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

Route::post('register', 'AuthController@register')->name('api.register');
Route::post('login', 'AuthController@login')->name('api.login');

Route::post('logout', 'AuthController@logout')->name('api.logout');
Route::post('refresh', 'AuthController@refresh')->name('api.refresh');
Route::post('me', 'AuthController@me')->name('api.me');

Route::apiResource('companies', 'CompanyController');
