<?php

namespace App\Http\Controllers;

use App\Models\nl_pembinaan;
use Illuminate\Http\Request;

class DataPembinaanController extends Controller
{
    public function index(Request $request)
    {
        $query = nl_pembinaan::query()
            ->join('datamahasiswa', 'nl_pembinaan.nim', '=', 'datamahasiswa.nim')
            ->select(
                'nl_pembinaan.*',
                'datamahasiswa.nama',
                'datamahasiswa.fakultas',
                'datamahasiswa.program_studi'
            )
            ->where('nl_pembinaan.status', 1);

        if ($request->has('search') && $request->search != '') {
            $query->Where('kategori_kegiatan', 'like', '%' . $request->search . '%')
                ->orwhere('nama_kegiatan', 'like', '%' . $request->search . '%')
                ->orWhere('tingkat_kegiatan', 'like', '%' . $request->search . '%')
                ->orWhere('tahun_kegiatan', 'like', '%' . $request->search . '%')
                ->orWhere('datamahasiswa.nama', 'like', '%' . $request->search . '%')
                ->orWhere('datamahasiswa.fakultas', 'like', '%' . $request->search . '%')
                ->orWhere('datamahasiswa.program_studi', 'like', '%' . $request->search . '%');
        }

        // pagination (10 data per halaman)
        $dataPembinaan = $query->paginate(10)->appends(['search' => $request->search]);

        // panggil view tanpa .blade.php
        return view('data-pembinaan-mental-kebangsaan', compact('dataPembinaan'));
    }
}
