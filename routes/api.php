<?php

use App\Http\Controllers\FontController;
use App\Http\Controllers\FontGroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/fonts', [FontController::class, 'index']);
Route::post('/fonts', [FontController::class, 'store']);
Route::delete('/fonts/{id}', [FontController::class, 'delete']);

Route::get('/font-groups', [FontGroupController::class, 'index']);
Route::post('/font-groups', [FontGroupController::class, 'store']);
Route::delete('/font-groups/{id}', [FontGroupController::class, 'delete']);
Route::put('/font-groups/{id}', [FontGroupController::class, 'update']);
