<?php

namespace App\Http\Controllers;

use App\Models\Mbkm;
use Illuminate\Http\Request;

class DataPenelitianController extends Controller
{
    public function index(Request $request)
    {
        $query = Mbkm::where('jenis', 'penelitian');

        // Filter pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('jenis', 'like', '%' . $request->search . '%')
                    ->orWhere('nama_program', 'like', '%' . $request->search . '%');
            });
        }

        // Pagination (10 per halaman)
        $datapenelitian = $query->paginate(10)->appends(['search' => $request->search]);

        return view('data-penelitian', compact('datapenelitian'));
    }
}
