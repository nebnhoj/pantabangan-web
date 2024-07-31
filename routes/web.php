<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PageController;
Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/attractions', [PageController::class, 'attractions']);
Route::get('/attractions/{slug}', [PageController::class, 'attractionView']);
Route::get('/blogs', [PageController::class, 'blogs']);
Route::get('/blogs/{slug}', [PageController::class, 'blogView']);

Route::get('/news', [PageController::class, 'news']);
