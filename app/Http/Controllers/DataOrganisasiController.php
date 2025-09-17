<?php

namespace App\Http\Controllers;

use App\Models\DataOrganisasi;
use Illuminate\Http\Request;

class DataOrganisasiController extends Controller
{
    public function index(Request $request)
    {
        $query = DataOrganisasi::query()
            ->join('datamahasiswa', 'dataorganisasi.nim', '=', 'datamahasiswa.nim')
            ->select(
                'dataorganisasi.*',
                'datamahasiswa.nama',
                'datamahasiswa.fakultas',
                'datamahasiswa.program_studi'
            )
            ->where('dataorganisasi.status', 1);

        // Filter pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_organisasi', 'like', '%' . $request->search . '%')
                ->orWhere('tingkat_organisasi', 'like', '%' . $request->search . '%')
                ->orWhere('jbt_organisasi', 'like', '%' . $request->search . '%')
                ->orWhere('datamahasiswa.nama', 'like', '%' . $request->search . '%')
                ->orWhere('datamahasiswa.fakultas', 'like', '%' . $request->search . '%')
                ->orWhere('datamahasiswa.program_studi', 'like', '%' . $request->search . '%');
        }

        // Pagination (10 per halaman)
        $dataorganisasi = $query->paginate(10)->appends(['search' => $request->search]);

        return view('data-organisasi', compact('dataorganisasi'));
    }
}
