<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModulPembelajaran extends Model
{
    protected $table = 'modul_pembelajarans';
    protected $fillable = [
        'judul_modul', 'mata_kuliah', 'jenjang', 'gambar', 'file', 'tahun_terbit'
    ];
}