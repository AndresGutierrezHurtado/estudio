<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CountryController;
use App\Http\Controllers\MedalController;
use App\Http\Controllers\ViewController;

// View Routes
Route::get('/', [ViewController::class, 'index']);
Route::get('/countries', [ViewController::class, 'countries']);
Route::get('/medals', [ViewController::class, 'medals']);

// ----- LOGIC ROUTES ----- //

// Countries Routes
Route::post('/countries', [CountryController::class, 'store']);
Route::put('/countries/{id}', [CountryController::class, 'update']);
Route::delete('/countries/{id}', [CountryController::class, 'destroy']);

// Medals Routes
Route::post('/medals', [MedalController::class, 'store']);
Route::put('/medals/{id}', [MedalController::class, 'update']);
Route::delete('/medals/{id}', [MedalController::class, 'destroy']);
