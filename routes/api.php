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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('register', 'App\Http\Controllers\AuthController@register');

    //Route::get('est', 'App\Http\Controllers\EstudianteController@index');
    Route::get('est', 'App\Http\Controllers\EstudianteController@show');
    Route::post('est', 'App\Http\Controllers\EstudianteController@store');
    Route::put('est/{i}', 'App\Http\Controllers\EstudianteController@update');
    Route::delete('est/{i}', 'App\Http\Controllers\EstudianteController@delete');

    //Route::get('res', 'App\Http\Controllers\ResultadoController@index');
    Route::get('res/{i}', 'App\Http\Controllers\ResultadoController@show');
    Route::post('res', 'App\Http\Controllers\ResultadoController@store');
    Route::put('res/{i}', 'App\Http\Controllers\ResultadoController@update');
    Route::delete('res/{i}', 'App\Http\Controllers\ResultadoController@delete');
});
