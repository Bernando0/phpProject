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

Route::get('post/{id}', [\App\Http\Controllers\PostController::class, 'get']);
Route::post('post', [\App\Http\Controllers\PostController::class, 'create']);
Route::put('post/{id}', [\App\Http\Controllers\PostController::class, 'update']);
Route::delete('post/{id}', [\App\Http\Controllers\PostController::class, 'delete']);

Route::get('audio/{id}', [\App\Http\Controllers\AudioController::class, 'get']);
Route::post('audio', [\App\Http\Controllers\AudioController::class, 'create']);
Route::put('audio/{id}', [\App\Http\Controllers\AudioController::class, 'update']);
Route::delete('audio/{id}', [\App\Http\Controllers\AudioController::class, 'delete']);

Route::get('genre/{id}', [\App\Http\Controllers\GenreController::class, 'get']);
Route::post('genre', [\App\Http\Controllers\GenreController::class, 'create']);
Route::put('genre/{id}', [\App\Http\Controllers\GenreController::class, 'update']);
Route::delete('genre/{id}', [\App\Http\Controllers\GenreController::class, 'delete']);


