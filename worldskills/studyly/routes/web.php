<?php

use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::get('/', [ViewController::class, 'index']);
Route::get('/register', [ViewController::class, 'register']);

// Student Routes
Route::get('/calls', [ViewController::class, 'calls']);
