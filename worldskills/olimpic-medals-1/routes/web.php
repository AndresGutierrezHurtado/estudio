<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function ($any) {
    return view('welcome');
})->where('any', '.*');
