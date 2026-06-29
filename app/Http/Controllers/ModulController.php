<?php

namespace App\Http\Controllers;

use App\Models\ModulPembelajaran;
use Illuminate\Http\Request;

class ModulController extends Controller
{
    public function index(Request $request)
    {
        $query = ModulPembelajaran::query();

        // ===== SEARCH =====
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul_modul', 'like', "%{$search}%")
                  ->orWhere('mata_kuliah', 'like', "%{$search}%");
            });
        }

        // ===== FILTER MATA KULIAH (checkbox array) =====
        if ($request->filled('mata_kuliah')) {
            $mk = $request->mata_kuliah;
            if (is_array($mk)) {
                $query->whereIn('mata_kuliah', $mk);
            } else {
                $query->where('mata_kuliah', $mk);
            }
        }

        // ===== FILTER JENJANG (checkbox array) =====
        if ($request->filled('jenjang')) {
            $j = $request->jenjang;
            if (is_array($j)) {
                $query->whereIn('jenjang', $j);
            } else {
                $query->where('jenjang', $j);
            }
        }

        // ===== FILTER TAHUN (dropdown min & max) =====
        if ($request->filled('tahun_min') && $request->filled('tahun_max')) {
            $query->whereBetween('tahun_terbit', [$request->tahun_min, $request->tahun_max]);
        }

        // ===== PAGINATION 8 PER HALAMAN =====
        $moduls = $query->paginate(8)->appends($request->query());

        // ===== AMBIL DATA UNTUK FILTER =====
        $mataKuliahList = ModulPembelajaran::select('mata_kuliah')->distinct()->pluck('mata_kuliah');
        $jenjangList = ModulPembelajaran::select('jenjang')->distinct()->pluck('jenjang');
        $tahunMin = ModulPembelajaran::min('tahun_terbit') ?? 2020;
        $tahunMax = ModulPembelajaran::max('tahun_terbit') ?? 2026;

        return view('publik.modul', compact('moduls', 'mataKuliahList', 'jenjangList', 'tahunMin', 'tahunMax'));
    }

    public function show($id)
    {
        $modul = ModulPembelajaran::findOrFail($id);
        return view('publik.modul-detail', compact('modul'));
    }
}