<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataprestasi;
use App\Models\dataorganisasi;
use App\Models\mbkm;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total dari masing-masing tabel
        $totalPrestasi = dataprestasi::count();
        $totalOrganisasi = dataorganisasi::count();

        // Hitung dari tabel MBKM berdasarkan nama_data
        $totalPenelitian = mbkm::where('jenis', 'penelitian')->count();
        $totalMagang = mbkm::where('jenis', 'magang')->count();

        return view('welcome', compact(
            'totalPrestasi',
            'totalOrganisasi',
            'totalPenelitian',
            'totalMagang'
        ));
    }
}
