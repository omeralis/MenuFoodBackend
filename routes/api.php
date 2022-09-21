<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenusController;
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
Route::get('test', function () {
    return 'omer api';
});

/*----Route EditMenu----*/

Route::get('/menu','App\Http\Controllers\MenusController@getMenu');
Route::post('/first-item','App\Http\Controllers\MenusController@getfirstItem');
Route::post('/menu','App\Http\Controllers\MenusController@postMenu');
Route::post('/edit-menu','App\Http\Controllers\MenusController@EditMenu');
Route::post('/delete-menu','App\Http\Controllers\MenusController@DeleteMenu');