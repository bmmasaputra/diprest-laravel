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

// Data Prestasi Routes
use App\Http\Controllers\DataPrestasiController;

Route::get('/data-prestasi', [DataPrestasiController::class, 'index'])->name('dataprestasi.index');

// data organisasi routes
use App\Http\Controllers\DataOrganisasiController;

Route::get('/data-organisasi', [DataOrganisasiController::class, 'index'])->name('dataorganisasi.index');

// data pertukaran mahasiswa routes
use App\Http\Controllers\DataPertukaranController;

Route::get('/data-pertukaran-mahasiswa', [DataPertukaranController::class, 'index'])->name('datapertukaran.index');

// data magang routes
use App\Http\Controllers\DataMagangController;

Route::get('/data-magang', [DataMagangController::class, 'index'])->name('datamagang.index');

// data mengajar routes
use App\Http\Controllers\DataMengajarController;

Route::get('/data-mengajar', [DataMengajarController::class, 'index'])->name('datamengajar.index');

// data penelitian routes
use App\Http\Controllers\DataPenelitianController;

Route::get('/data-penelitian', [DataPenelitianController::class, 'index'])->name('datapenelitian.index');

// data proyek kemanusiaan routes
use App\Http\Controllers\DataKemanusiaanController;

Route::get('/data-proyek-kemanusiaan', [DataKemanusiaanController::class, 'index'])->name('datakemanusiaan.index');

// data proyek desa routes
use App\Http\Controllers\DataProyekDesaController;

Route::get('/data-proyek', [DataProyekDesaController::class, 'index'])->name('datadesa.index');

// data wirausaha routes
use App\Http\Controllers\DataWirausahaController;

Route::get('/data-wirausaha', [DataWirausahaController::class, 'index'])->name('datawirausaha.index');

// data studi proyek independen routes
use App\Http\Controllers\DataIndependenController;

Route::get('/data-studi-proyek-independen', [DataIndependenController::class, 'index'])->name('dataindependen.index');

// data pengabdian routes
use App\Http\Controllers\DataPengabdianController;

Route::get('/data-pengabdian', [DataPengabdianController::class, 'index'])->name('datapengabdian.index');

// data rekognisi routes
use App\Http\Controllers\DataRekognisiController;

Route::get('/data-rekognisi', [DataRekognisiController::class, 'index'])->name('datarekognisi.index');

// data pembinaan mental kebangsaan routes
use App\Http\Controllers\DataPembinaanController;

Route::get('/data-pembinaan-mental-kebangsaan', [DataPembinaanController::class, 'index'])->name('datapembinaan.index');

// data sertifikasi routes
use App\Http\Controllers\DataSertifikasiController;

Route::get('/data-sertifikasi', [DataSertifikasiController::class, 'index'])->name('datasertifikasi.index');

// dashboard routes
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
