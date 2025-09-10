<?php

namespace App\Http\Controllers;

use App\Models\Mbkm;
use Illuminate\Http\Request;

class DataMagangController extends Controller
{
    public function index(Request $request)
    {
        $query = Mbkm::where('jenis', 'magang');

        // Filter pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('jenis', 'like', '%' . $request->search . '%')
                    ->orWhere('nama_program', 'like', '%' . $request->search . '%');
            });
        }

        // Pagination (10 per halaman)
        $datamagang = $query->paginate(10)->appends(['search' => $request->search]);

        return view('data-magang', compact('datamagang'));
    }
}
