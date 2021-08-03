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


Route::post('/login', [App\Http\Controllers\ApiController::class, 'login']);
Route::post('/register', [App\Http\Controllers\ApiController::class, 'register']);

Route::get('/user/{id}', [App\Http\Controllers\ApiController::class, 'getUser']);
Route::get('/users', [App\Http\Controllers\ApiController::class, 'getAllUser']);

Route::post('/jobs', [App\Http\Controllers\ApiController::class, 'allJobs']);
Route::get('/job/{id}', [App\Http\Controllers\ApiController::class, 'getJob']);

Route::post('/category', [App\Http\Controllers\ApiController::class, 'allCategory']);

Route::post('/order', [App\Http\Controllers\ApiController::class, 'storeOrder']);
Route::put('/order/{id}', [App\Http\Controllers\ApiController::class, 'updateOrder']);
Route::get('/order/{id}', [App\Http\Controllers\ApiController::class, 'getOrder']);
Route::delete('/order/{id}', [App\Http\Controllers\ApiController::class, 'deleteOrder']);

Route::post('/comment', [App\Http\Controllers\ApiController::class, 'storeComment']);
Route::delete('/comment/{id}', [App\Http\Controllers\ApiController::class, 'deleteComment']);
