<?php

namespace App\Http\Controllers;

use App\Models\DataPrestasi;
use Illuminate\Http\Request;

class DataPrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = DataPrestasi::query()
            ->join('datamahasiswa', 'dataprestasi.nim', '=', 'datamahasiswa.nim')
            ->select(
                'dataprestasi.*',
                'datamahasiswa.nama',
                'datamahasiswa.fakultas',
                'datamahasiswa.program_studi'
            );

        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('nama_kegiatan', 'like', '%' . $request->search . '%')
                    ->orWhere('kategori_kegiatan', 'like', '%' . $request->search . '%')
                    ->orWhere('tingkat_kegiatan', 'like', '%' . $request->search . '%')
                    ->orWhere('datamahasiswa.nama', 'like', '%' . $request->search . '%')
                    ->orWhere('datamahasiswa.fakultas', 'like', '%' . $request->search . '%')
                    ->orWhere('datamahasiswa.program_studi', 'like', '%' . $request->search . '%');
            });
        }

        $dataprestasi = $query->paginate(10)->appends(['search' => $request->search]);

        return view('data-prestasi', compact('dataprestasi'));
    }
}
