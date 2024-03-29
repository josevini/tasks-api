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

Route::get('/task/all', [\App\Http\Controllers\TasksController::class, 'listAll']);

Route::post('/task/add', [\App\Http\Controllers\TasksController::class, 'addTask']);

Route::put('/task/edit/{id}', [\App\Http\Controllers\TasksController::class, 'editTask']);

Route::delete('/task/remove/{id}', [\App\Http\Controllers\TasksController::class, 'deleteTask']);

Route::get('/task/{id}', [\App\Http\Controllers\TasksController::class, 'list']);
