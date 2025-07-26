<?php

use App\Http\Controllers\PlayController;
use App\Http\Controllers\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Teams routes
Route::post('/teams', [TeamController::class, 'store']);
Route::get('/teams', [TeamController::class, 'index']);
Route::get('/teams/ranking', [TeamController::class, 'ranking']);
Route::get('/teams/{id}', [TeamController::class, 'show']);

// Play routes
Route::post('/plays', [PlayController::class, 'store']);
Route::get('/plays', [PlayController::class, 'index']);
