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
