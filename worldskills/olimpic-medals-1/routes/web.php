<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{any}', function ($any) {
    return view('welcome');
})->where('any', '.*');
