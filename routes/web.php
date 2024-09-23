<?php

use App\Models\Ad;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    $ads = Ad::all();
    return view('home', compact('ads'));
});
