<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CountryController;
use App\Http\Controllers\MedalController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CompetitorController;

// View Routes
Route::get('/', [ViewController::class, 'index']);
Route::get('/countries', [ViewController::class, 'countries']);
Route::get('/medals', [ViewController::class, 'medals']);
Route::get('/competitors', [ViewController::class, 'competitors']);
Route::get('/competitors/{id}', [ViewController::class, 'competitorDetail']);
Route::get('/ranking', [ViewController::class, 'ranking']);

// ----- LOGIC ROUTES ----- //

// Countries Routes
Route::post('/countries', [CountryController::class, 'store']);
Route::put('/countries/{id}', [CountryController::class, 'update']);
Route::delete('/countries/{id}', [CountryController::class, 'destroy']);

// Medals Routes
Route::post('/medals', [MedalController::class, 'store']);
Route::put('/medals/{id}', [MedalController::class, 'update']);
Route::delete('/medals/{id}', [MedalController::class, 'destroy']);

// Competitors Routes
Route::post('/competitors', [CompetitorController::class, 'store']);
Route::put('/competitors/{id}', [CompetitorController::class, 'update']);
Route::delete('/competitors/{id}', [CompetitorController::class, 'destroy']);
