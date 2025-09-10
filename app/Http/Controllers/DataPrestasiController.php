<?php

namespace App\Http\Controllers;

use App\Models\DataPrestasi;
use Illuminate\Http\Request;

class DataPrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = DataPrestasi::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_kegiatan', 'like', '%' . $request->search . '%')
                ->orWhere('kategori_kegiatan', 'like', '%' . $request->search . '%')
                ->orWhere('tingkat_kegiatan', 'like', '%' . $request->search . '%');
        }

        // pagination (10 data per halaman)
        $dataprestasi = $query->paginate(10)->appends(['search' => $request->search]);

        // panggil view tanpa .blade.php
        return view('data-prestasi', compact('dataprestasi'));
    }
}
