<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\News\ArticleController;

Route::get('api/aktualnosci', [ArticleController::class, 'index']);
