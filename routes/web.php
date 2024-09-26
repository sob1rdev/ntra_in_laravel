<?php

use App\Actions\GetAds;
use App\Http\Controllers\AdController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Actions\GetAds::class);
Route::resource('ads', \App\Http\Controllers\AdController::class);
Route::get('/search', [AdController::class, 'index'] );
