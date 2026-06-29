<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ModulPembelajaran;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // === Stat Cards ===
        $totalModul = ModulPembelajaran::count();
        $totalModulAktif = ModulPembelajaran::where('status', 'active')->count();
        $modulBaruBulanIni = ModulPembelajaran::whereMonth('created_at', now()->month)->count();
        $totalUserAdmin = User::where('role', 'admin')->count();

        // Total Unduhan (placeholder dinamis)
        $totalUnduhan = ModulPembelajaran::count() * 10 + rand(0, 50);

        // === Data Modul Terbaru untuk Tabel ===
        $moduls = ModulPembelajaran::latest()->take(5)->get();

        // === Nama User Login ===
        $userName = Auth::user()->name ?? 'Agus Dwijayanto';

        // === Waktu Login Terakhir ===
        $lastLogin = now()->subMinutes(10)->diffForHumans(); // placeholder

        return view('admin.dashboard', compact(
            'totalModul',
            'totalModulAktif',
            'modulBaruBulanIni',
            'totalUserAdmin',
            'totalUnduhan',
            'moduls',
            'userName',
            'lastLogin'
        ));
    }
}