@extends('layouts.app')
@section('title', 'Beranda')

@section('content')

<!-- ===== HERO SECTION ===== -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Kiri: Teks -->
            <div class="col-lg-7">
                <h1 class="hero-title">
                    Berbagi Ilmu,<br>
                    Membangun <span>Generasi Digital</span>
                </h1>
                <p class="hero-subtitle">
                    Temukan Sumber Belajar IT Praktis untuk Portofolio Saya &amp; Publik.
                </p>

                <!-- Search Box (mengarah ke halaman modul) -->
                <form action="/modul" method="GET" class="search-box">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari Judul, Mata Kuliah, Jenjang..." value="{{ request('search') }}">
                        <button class="btn btn-search" type="submit">
                            <i class="fas fa-search me-2"></i> Cari
                        </button>
                    </div>
                </form>
            </div>

            <!-- Kanan: Ilustrasi (dari folder public/images) -->
            <div class="col-lg-5 text-center">
                <img src="{{ asset('images/illustration-programmer.png') }}" alt="Ilustrasi Programmer - Agus Dwijayanto" class="hero-image" style="max-width: 100%; height: auto;">
            </div>
        </div>
    </div>
</section>

<!-- ===== MODUL TERBARU ===== -->
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title">📚 Modul <span>Terbaru</span></h2>
            <a href="/modul" class="btn btn-outline-success" style="border-color: var(--primary-green); color: var(--primary-green); font-weight: 500; border-radius: 8px;">
                Lihat Semua <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>

        <div class="row">
            @php
                $moduls = \App\Models\ModulPembelajaran::latest()->take(4)->get();
            @endphp

            @forelse($moduls as $modul)
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card modul-card">
                    @if($modul->gambar)
                        <img src="{{ asset('storage/'.$modul->gambar) }}" class="card-img-top" alt="{{ $modul->judul_modul }}" style="height: 180px; object-fit: cover;">
                    @else
                        <div style="height: 180px; background: #1E293B; display: flex; align-items: center; justify-content: center; color: white; font-size: 14px; border-radius: 16px 16px 0 0;">
                            <i class="fas fa-image me-2"></i> Gambar Modul
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $modul->judul_modul }}</h5>
                        <p class="card-text"><strong>Mata Kuliah:</strong> {{ $modul->mata_kuliah }}</p>
                        <p class="card-text">
                            <strong>Jenjang:</strong>
                            <span class="badge-jenjang">{{ $modul->jenjang }}</span>
                        </p>
                        <p class="card-text"><strong>Tahun:</strong> {{ $modul->tahun_terbit }}</p>

                        <div class="d-flex gap-2 mt-3">
                            <a href="{{ route('publik.modul.show', $modul->id) }}" class="btn btn-detail">
                                <i class="fas fa-eye me-1"></i> Detail
                            </a>
                            @if($modul->file)
                                <a href="{{ asset('storage/'.$modul->file) }}" class="btn btn-download" target="_blank">
                                    <i class="fas fa-download me-1"></i> Download
                                </a>
                            @else
                                <button class="btn btn-download" disabled style="opacity:0.5;">
                                    <i class="fas fa-download me-1"></i> No File
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-book-open" style="font-size: 48px; color: #CBD5E1;"></i>
                <p class="mt-3 text-muted">Belum ada modul. Silakan tambahkan di admin.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection