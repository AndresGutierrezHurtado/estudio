<?php

use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ViewController::class, 'index']);
Route::get('/countries', [ViewController::class, 'countries']);
Route::get('/medals', [ViewController::class, 'medals']);
