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
Route::post('carga/{tip}/{id}', 'App\Http\Controllers\SubirArchivoController@subirarchivo');
Route::post('cargapro', 'App\Http\Controllers\SubirArchivoController@subirarchivoimg');
Route::post('cargaaudio', 'App\Http\Controllers\SubirArchivoController@subirarchivoaudio');

Route::post('cargatabla', 'App\Http\Controllers\TablaArchivoController@insertarchivo');

Route::get('getmibancoC/{id}', 'App\Http\Controllers\TablaArchivoController@getmibancoC')->middleware('auth:api');
Route::get('getmibancoA/{id}', 'App\Http\Controllers\TablaArchivoController@getmibancoA')->middleware('auth:api');
Route::get('getmibancoP/{id}', 'App\Http\Controllers\TablaArchivoController@getmibancoP')->middleware('auth:api');
Route::get('getmibancoR', 'App\Http\Controllers\TablaArchivoController@getmibancoR')->middleware('auth:api');
Route::put('updatebanco/{id}', 'App\Http\Controllers\TablaArchivoController@updatebanco')->middleware('auth:api');

Route::post('insercoment', 'App\Http\Controllers\ComentariosController@insercoment')->middleware('auth:api');
Route::get('getcoments', 'App\Http\Controllers\ComentariosController@getcoments')->middleware('auth:api');

Route::post('insertescenario', 'App\Http\Controllers\EscenarioController@insertaescenario')->middleware('auth:api');
Route::get('getescenarios/{id}', 'App\Http\Controllers\EscenarioController@getescenarios')->middleware('auth:api');
Route::put('updatefase/{id}', 'App\Http\Controllers\EscenarioController@updatefase')->middleware('auth:api');
Route::get('getaudios', 'App\Http\Controllers\TablaArchivoController@getaudios')->middleware('auth:api');


Route::post('insertafauno', 'App\Http\Controllers\FaunoController@insertafauno')->middleware('auth:api');
Route::post('insertafados', 'App\Http\Controllers\FadosController@insertafados')->middleware('auth:api');
Route::post('insertafadosurl', 'App\Http\Controllers\FadosurlController@insertafadosurl')->middleware('auth:api');

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

Route::get('getdisciplina', 'App\Http\Controllers\CatDisciplinaController@getdisciplina')->middleware('auth:api');
Route::get('getnivel', 'App\Http\Controllers\CatNiveleducativoController@getnivel')->middleware('auth:api');



