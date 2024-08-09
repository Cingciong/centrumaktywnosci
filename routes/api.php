<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\News\ArticleController;
use App\Http\Controllers\Pages\Reservations\RoomController;
use App\Http\Controllers\Pages\Reservations\ReservationController;

Route::get('api/aktualnosci', [ArticleController::class, 'index']);
Route::get('api/rezerwacje', [ReservationController::class, 'getReservations']);
Route::get('api/pokoje', [RoomController::class, 'index']);
