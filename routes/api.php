<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UUIDController;
use App\Http\Controllers\Api\UUIDApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('/uuid', [UUIDApiController::class]);
Route::get('/uuid', [UUIDApiController::class, 'list']);
Route::post('/uuid', [UUIDApiController::class, 'generate']);
Route::post('/uuid/{id}', [UUIDApiController::class, 'retrieve']);
Route::delete('/uuid/{id}', [UUIDApiController::class, 'delete']);