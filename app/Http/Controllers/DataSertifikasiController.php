<?php

namespace App\Http\Controllers;

use App\Models\nl_sertifikasi;
use Illuminate\Http\Request;

class DataSertifikasiController extends Controller
{
    public function index(Request $request)
    {
        $query = nl_sertifikasi::query();

        if ($request->has('search') && $request->search != '') {
            $query->Where('dosen_pendamping', 'like', '%' . $request->search . '%')
                ->orwhere('nama_skema_sertifikasi', 'like', '%' . $request->search . '%')
                ->orWhere('tingkat_kegiatan', 'like', '%' . $request->search . '%')
                ->orWhere('tahun_kegiatan', 'like', '%' . $request->search . '%');
        }

        // pagination (10 data per halaman)
        $datasertifikasi = $query->paginate(10)->appends(['search' => $request->search]);

        // panggil view tanpa .blade.php
        return view('data-sertifikasi', compact('datasertifikasi'));
    }
}
