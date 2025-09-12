<?php

namespace App\Http\Controllers;

use App\Models\nl_rekognisi;
use Illuminate\Http\Request;

class DataRekognisiController extends Controller
{
    public function index(Request $request)
    {
        $query = nl_rekognisi::query()
            ->join('datamahasiswa', 'nl_rekognisi.nim', '=', 'datamahasiswa.nim')
            ->select(
                'nl_rekognisi.*',
                'datamahasiswa.nama',
                'datamahasiswa.fakultas',
                'datamahasiswa.program_studi'
            );


        if ($request->has('search') && $request->search != '') {
            $query->Where('kategori_kegiatan', 'like', '%' . $request->search . '%')
                ->orwhere('nama_kegiatan', 'like', '%' . $request->search . '%')
                ->orWhere('tahun_kegiatan', 'like', '%' . $request->search . '%')
                ->orWhere('datamahasiswa.nama', 'like', '%' . $request->search . '%')
                ->orWhere('datamahasiswa.fakultas', 'like', '%' . $request->search . '%')
                ->orWhere('datamahasiswa.program_studi', 'like', '%' . $request->search . '%');
        }

        // pagination (10 data per halaman)
        $datarekognisi = $query->paginate(10)->appends(['search' => $request->search]);

        // panggil view tanpa .blade.php
        return view('data-rekognisi', compact('datarekognisi'));
    }
}
