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

        // Fungsi untuk format angka (1.2k, 3.4M, dst)
        $formatNumber = function ($number) {
            if ($number >= 1000000) {
                return round($number / 1000000, 1) . 'M';
            } elseif ($number >= 1000) {
                return round($number / 1000, 1) . 'k';
            }
            return $number;
        };

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
