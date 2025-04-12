<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaylistController;

Route::get('/playlist', [PlaylistController::class, 'get']);
Route::post('/playlist', [PlaylistController::class, 'post']);
Route::delete('/playlist/{id}', [PlaylistController::class, 'delete']);
