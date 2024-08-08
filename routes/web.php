<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/api.php';

Route::get('/{pathMatch}', function () {
    return view('welcome');
})->where('pathMatch', '.*');



