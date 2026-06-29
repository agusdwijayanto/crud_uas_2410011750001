<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulPembelajaranSeeder extends Seeder
{
    public function run(): void
    {
        $moduls = [
            [
                'judul_modul' => 'Pengenalan Laravel 13',
                'mata_kuliah' => 'Rekayasa Web',
                'jenjang' => 'S1',
                'gambar' => null,
                'file' => null,
                'tahun_terbit' => 2026,
            ],
            [
                'judul_modul' => 'Basis Data Lanjut',
                'mata_kuliah' => 'Basis Data',
                'jenjang' => 'S1',
                'gambar' => null,
                'file' => null,
                'tahun_terbit' => 2025,
            ],
            [
                'judul_modul' => 'Pemrograman Mobile',
                'mata_kuliah' => 'Mobile Programming',
                'jenjang' => 'S2',
                'gambar' => null,
                'file' => null,
                'tahun_terbit' => 2026,
            ],
            [
                'judul_modul' => 'Statistika Dasar',
                'mata_kuliah' => 'Statistika',
                'jenjang' => 'D3',
                'gambar' => null,
                'file' => null,
                'tahun_terbit' => 2024,
            ],
            [
                'judul_modul' => 'Pengantar AI',
                'mata_kuliah' => 'Kecerdasan Buatan',
                'jenjang' => 'S1',
                'gambar' => null,
                'file' => null,
                'tahun_terbit' => 2025,
            ],
        ];

        foreach ($moduls as $modul) {
            DB::table('modul_pembelajarans')->insert(array_merge($modul, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}