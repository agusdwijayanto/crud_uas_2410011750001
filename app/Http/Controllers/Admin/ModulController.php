<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModulPembelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ModulController extends Controller
{
    public function index(Request $request)
    {
        $query = ModulPembelajaran::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul_modul', 'like', "%{$search}%")
                  ->orWhere('mata_kuliah', 'like', "%{$search}%");
            });
        }

        if ($request->filled('jenjang')) {
            $query->where('jenjang', $request->jenjang);
        }

        $moduls = $query->paginate(10)->appends($request->query());

        return view('admin.modul.index', compact('moduls'));
    }

    public function create()
    {
        return view('admin.modul.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_modul' => 'required|string|max:255',
            'mata_kuliah' => 'required|string|max:255',
            'jenjang' => 'required|in:S1,S2,D3,SMA/K,Umum',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'file' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'tahun_terbit' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        $data = $request->except(['gambar', 'file']);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('modul_images', 'public');
            $data['gambar'] = $path;
        }

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('modul_files', 'public');
            $data['file'] = $path;
        }

        ModulPembelajaran::create($data);

        return redirect()->route('admin.modul.index')->with('success', 'Modul berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $modul = ModulPembelajaran::findOrFail($id);
        return view('admin.modul.edit', compact('modul'));
    }

    public function update(Request $request, $id)
    {
        $modul = ModulPembelajaran::findOrFail($id);

        $request->validate([
            'judul_modul' => 'required|string|max:255',
            'mata_kuliah' => 'required|string|max:255',
            'jenjang' => 'required|in:S1,S2,D3,SMA/K,Umum',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'file' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'tahun_terbit' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        $data = $request->except(['gambar', 'file']);

        if ($request->hasFile('gambar')) {
            if ($modul->gambar) {
                Storage::disk('public')->delete($modul->gambar);
            }
            $path = $request->file('gambar')->store('modul_images', 'public');
            $data['gambar'] = $path;
        }

        if ($request->hasFile('file')) {
            if ($modul->file) {
                Storage::disk('public')->delete($modul->file);
            }
            $path = $request->file('file')->store('modul_files', 'public');
            $data['file'] = $path;
        }

        $modul->update($data);

        return redirect()->route('admin.modul.index')->with('success', 'Modul berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $modul = ModulPembelajaran::findOrFail($id);
        if ($modul->gambar) {
            Storage::disk('public')->delete($modul->gambar);
        }
        if ($modul->file) {
            Storage::disk('public')->delete($modul->file);
        }
        $modul->delete();

        return redirect()->route('admin.modul.index')->with('success', 'Modul dihapus.');
    }

    public function exportPdf()
    {
        $moduls = ModulPembelajaran::all();
        $pdf = Pdf::loadView('admin.modul.pdf', compact('moduls'));
        return $pdf->download('daftar_modul.pdf');
    }
}