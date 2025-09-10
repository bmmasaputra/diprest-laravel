<?php

namespace App\Http\Controllers;

use App\Models\DataOrganisasi;
use Illuminate\Http\Request;

class DataOrganisasiController extends Controller
{
    public function index(Request $request)
    {
        $query = DataOrganisasi::query();

        // Filter pencarian
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_organisasi', 'like', '%' . $request->search . '%')
                ->orWhere('tingkat_organisasi', 'like', '%' . $request->search . '%')
                ->orWhere('jbt_organisasi', 'like', '%' . $request->search . '%');
        }

        // Pagination (10 per halaman)
        $dataorganisasi = $query->paginate(10)->appends(['search' => $request->search]);

        return view('data-organisasi', compact('dataorganisasi'));
    }
}
