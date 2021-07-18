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

Route::get('getusuario/{id}', 'App\Http\Controllers\UserController@getUsuario')->middleware('auth:api');
Route::get('deluser/{id}', 'App\Http\Controllers\UserController@borrausuario')->middleware('auth:api');
Route::post('insertusuario', 'App\Http\Controllers\UserController@insertusuario')->middleware('auth:api');
Route::put('updateusu/{id}', 'App\Http\Controllers\UserController@updateusu')->middleware('auth:api');

Route::post('login', 'App\Http\Controllers\UserController@login');


Route::get('getuni/{id}', 'App\Http\Controllers\CatUniversidadeController@getUni')->middleware('auth:api');
Route::get('deluni/{id}', 'App\Http\Controllers\CatUniversidadeController@borrauni')->middleware('auth:api');
Route::post('insertuni', 'App\Http\Controllers\CatUniversidadeController@insertuni')->middleware('auth:api');
Route::put('updateuni/{id}', 'App\Http\Controllers\CatUniversidadeController@updateuni')->middleware('auth:api');

Route::get('getusuarios', 'App\Http\Controllers\UserController@getusuarios')->middleware('auth:api');
Route::get('getusuarios/{id}', 'App\Http\Controllers\UserController@getusuariosfiltro')->middleware('auth:api');
Route::get('getunis', 'App\Http\Controllers\UserController@getUnis')->middleware('auth:api');
Route::get('getunis/{id}', 'App\Http\Controllers\UserController@getunifiltro')->middleware('auth:api');

Route::get('obtencatalogo/{op}/{tipo}', 'App\Http\Controllers\CatalogosController@obtencatalogo')->middleware('auth:api');
Route::get('catalogosuno', 'App\Http\Controllers\CatalogosController@catalogosuno')->middleware('auth:api');
Route::get('catalogosdos/{id}', 'App\Http\Controllers\CatalogosController@catalogosdos')->middleware('auth:api');


