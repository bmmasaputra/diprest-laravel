<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cards;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/statistik', function () {
    $cards = Cards::all();
    return view('statistik', compact('cards'));
});
