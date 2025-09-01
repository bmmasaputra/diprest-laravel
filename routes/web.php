<?php

use App\Models\Cards;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;

// Landing Page
Route::get('/', function () {
    return view('welcome');
})->name('landing');

// Statistik Page
Route::get('/statistik', function () {
    $cards = Cards::all();
    return view('statistik', compact('cards'));
})->name('statistik');

// Login Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
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

// Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// User Dashboard (hanya bisa diakses kalau login dengan guard web)
// Route::middleware('auth')->group(function () {
//     Route::get('/admin', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');
// });

// Auth scaffolding default user (jika kamu tetap butuh register dll untuk guard web)
require __DIR__ . '/auth.php';