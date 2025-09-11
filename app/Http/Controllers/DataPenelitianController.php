<?php

namespace App\Http\Controllers;

use App\Models\Mbkm;
use Illuminate\Http\Request;

class DataPenelitianController extends Controller
{
    public function index(Request $request)
    {
        $query = Mbkm::where('jenis', 'penelitian')
            ->join('datamahasiswa', 'mbkm.nim', '=', 'datamahasiswa.nim')
            ->select(
                'mbkm.*',
                'datamahasiswa.nama',
                'datamahasiswa.fakultas',
                'datamahasiswa.program_studi'
            );

        // Filter pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('jenis', 'like', '%' . $request->search . '%')
                    ->orWhere('nama_program', 'like', '%' . $request->search . '%')
                    ->orWhere('datamahasiswa.nama', 'like', '%' . $request->search . '%')
                    ->orWhere('datamahasiswa.fakultas', 'like', '%' . $request->search . '%')
                    ->orWhere('datamahasiswa.program_studi', 'like', '%' . $request->search . '%');
            });
        }

        // Pagination (10 per halaman)
        $datapenelitian = $query->paginate(10)->appends(['search' => $request->search]);

        return view('data-penelitian', compact('datapenelitian'));
    }
}
