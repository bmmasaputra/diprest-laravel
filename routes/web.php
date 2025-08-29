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

Route::get('/data-prestasi', function () {
    return view('data-prestasi');
});

Route::get('/data-organisasi', function () {
    return view('data-organisasi');
});

Route::get('/data-pertukaran-mahasiswa', function () {
    return view('data-pertukaran-mahasiswa');
});

Route::get('/data-magang', function () {
    return view('data-magang');
});

Route::get('/data-mengajar', function () {
    return view('data-mengajar');
});

Route::get('/data-penelitian', function () {
    return view('data-penelitian');
});

Route::get('/data-proyek-kemanusiaan', function () {
    return view('data-proyek-kemanusiaan');
});

Route::get('/data-proyek', function () {
    return view('data-proyek');
});

Route::get('/data-studi-proyek-independen', function () {
    return view('data-studi-proyek-independen');
});

Route::get('/data-wirausaha', function () {
    return view('data-wirausaha');
});

Route::get('/data-pengabdian', function () {
    return view('data-pengabdian');
});

Route::get('/data-rekognisi', function () {
    return view('data-rekognisi');
});

Route::get('/data-pembinaan-mental-kebangsaan', function () {
    return view('data-pembinaan-mental-kebangsaan');
});

Route::get('/data-sertifikasi', function () {
    return view('data-sertifikasi');
});
