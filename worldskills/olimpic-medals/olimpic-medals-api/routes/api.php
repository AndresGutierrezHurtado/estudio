<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CompetitorController;
use App\Http\Controllers\MedalController;

// Countries routes
Route::post('/countries', [CountryController::class, 'store']);
Route::get('/countries', [CountryController::class, 'index']);
Route::get('/countries/{id}', [CountryController::class, 'show']);
Route::put('/countries/{id}', [CountryController::class, 'update']);
Route::delete('/countries/{id}', [CountryController::class, 'destroy']);

// Competitors routes
Route::post('/competitors', [CompetitorController::class, 'store']);
Route::get('/competitors', [CompetitorController::class, 'index']);
Route::get('/competitors/{id}', [CompetitorController::class, 'show']);
Route::put('/competitors/{id}', [CompetitorController::class, 'update']);
Route::delete('/competitors/{id}', [CompetitorController::class, 'destroy']);

// Medals routes
Route::post('/medals', [MedalController::class, 'store']);
Route::get('/medals', [MedalController::class, 'index']);
Route::get('/medals/{id}', [MedalController::class, 'show']);
Route::put('/medals/{id}', [MedalController::class, 'update']);
Route::delete('/medals/{id}', [MedalController::class, 'destroy']);
