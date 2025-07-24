<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PlayController;
use App\Http\Controllers\TeamController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Plays routes
Route::get('/plays', [PlayController::class, 'index']);
Route::post('/plays', [PlayController::class, 'store']);
Route::put('/plays/{id}', [PlayController::class, 'update']);
Route::delete('/plays/{id}', [PlayController::class, 'delete']);

// Teams routes
Route::get('/teams', [TeamController::class, 'index']);
Route::post('/teams', [TeamController::class, 'store']);
Route::put('/teams/{id}', [TeamController::class, 'update']);
Route::delete('/teams/{id}', [TeamController::class, 'delete']);
