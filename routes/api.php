<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\News\ArticleController;
use App\Http\Controllers\Pages\Reservations\RoomController;

Route::get('api/aktualnosci', [ArticleController::class, 'index']);
Route::get('api/pokoje', [RoomController::class, 'index']);
