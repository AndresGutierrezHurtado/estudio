<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ViewController;
use App\Http\Controllers\AuthController;

// Auth routes
Route::middleware(['guest'])->group(function () {
    Route::get('/', [ViewController::class, 'index']);
    Route::get('/login', [ViewController::class, 'index']);
    Route::get('/register', [ViewController::class, 'register']);
});

// Student Routes
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/calls', [ViewController::class, 'calls']);
});

// Admin routes
Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/calls', [ViewController::class, 'callsManagement']);
});

// Logic Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
