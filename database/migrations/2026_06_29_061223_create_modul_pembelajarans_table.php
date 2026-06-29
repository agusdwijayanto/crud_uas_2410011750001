<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modul_pembelajarans', function (Blueprint $table) {
            $table->id();
            $table->string('judul_modul');
            $table->string('mata_kuliah');
            $table->enum('jenjang', ['S1', 'S2', 'D3', 'SMA/K', 'Umum']);
            $table->string('gambar')->nullable();
            $table->string('file')->nullable();
            $table->year('tahun_terbit');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modul_pembelajarans');
    }
};