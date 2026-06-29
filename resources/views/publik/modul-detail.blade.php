@extends('layouts.app')
@section('title', $modul->judul_modul)

@section('content')

<!-- ===== HEADER HALAMAN ===== -->
<section class="py-4" style="background: linear-gradient(135deg, #EEF2FF 0%, #E0E7FF 100%);">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" style="color: var(--primary-green); text-decoration: none;">Beranda</a></li>
                <li class="breadcrumb-item"><a href="/modul" style="color: var(--primary-green); text-decoration: none;">Modul</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $modul->judul_modul }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- ===== DETAIL MODUL ===== -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Kolom Kiri: Gambar -->
            <div class="col-lg-6 mb-4">
                <div class="card modul-card" style="border-radius: 16px; overflow: hidden;">
                    @if($modul->gambar)
                        <img src="{{ asset('storage/'.$modul->gambar) }}" alt="{{ $modul->judul_modul }}" class="img-fluid" style="width: 100%; max-height: 450px; object-fit: cover;">
                    @else
                        <img src="https://placehold.co/600x450/1E293B/ffffff?text=Gambar+Modul" alt="Placeholder" class="img-fluid" style="width: 100%; max-height: 450px; object-fit: cover;">
                    @endif
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex gap-3 mt-3">
                    <a href="/modul" class="btn btn-outline-secondary" style="border-radius: 10px; padding: 10px 24px;">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                    @if($modul->file)
                        <a href="{{ asset('storage/'.$modul->file) }}" class="btn btn-download" target="_blank" style="padding: 10px 30px; border-radius: 10px;">
                            <i class="fas fa-download me-2"></i> Download Modul
                        </a>
                    @else
                        <button class="btn btn-download" disabled style="padding: 10px 30px; border-radius: 10px; opacity:0.5;">
                            <i class="fas fa-download me-2"></i> Tidak Ada File
                        </button>
                    @endif
                </div>
            </div>

            <!-- Kolom Kanan: Informasi -->
            <div class="col-lg-6">
                <div class="card modul-card" style="border-radius: 16px; padding: 30px;">
                    <h2 class="fw-bold" style="color: #1E293B;">{{ $modul->judul_modul }}</h2>

                    <hr style="border-color: #E2E8F0;">

                    <div class="row">
                        <div class="col-sm-6">
                            <p><strong><i class="fas fa-book me-2" style="color: var(--primary-green);"></i> Mata Kuliah</strong></p>
                            <p style="color: #475569;">{{ $modul->mata_kuliah }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p><strong><i class="fas fa-graduation-cap me-2" style="color: var(--primary-green);"></i> Jenjang</strong></p>
                            <p><span class="badge-jenjang" style="font-size: 14px; padding: 6px 16px;">{{ $modul->jenjang }}</span></p>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-6">
                            <p><strong><i class="fas fa-calendar-alt me-2" style="color: var(--primary-green);"></i> Tahun Terbit</strong></p>
                            <p style="color: #475569;">{{ $modul->tahun_terbit }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p><strong><i class="fas fa-clock me-2" style="color: var(--primary-green);"></i> Status</strong></p>
                            <p><span class="badge" style="background: #F0FDF4; color: var(--primary-green); padding: 6px 16px; border-radius: 20px; font-weight: 600;">Aktif</span></p>
                        </div>
                    </div>

                    <hr style="border-color: #E2E8F0;">

                    <div>
                        <p><strong><i class="fas fa-info-circle me-2" style="color: var(--primary-green);"></i> Deskripsi Modul</strong></p>
                        <p style="color: #475569; line-height: 1.8;">
                            Modul ini membahas tentang <strong>{{ $modul->judul_modul }}</strong> pada mata kuliah <strong>{{ $modul->mata_kuliah }}</strong>.
                            Ditujukan untuk jenjang <strong>{{ $modul->jenjang }}</strong> dan diterbitkan pada tahun <strong>{{ $modul->tahun_terbit }}</strong>.
                        </p>
                    </div>

                    <div class="mt-3">
                        <p><strong><i class="fas fa-tag me-2" style="color: var(--primary-green);"></i> ID Modul</strong></p>
                        <p style="color: #94A3B8; font-size: 14px;">#{{ $modul->id }} | {{ $modul->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== REKOMENDASI MODUL LAIN ===== -->
<section class="py-4" style="background: #F8FAFC;">
    <div class="container">
        <h4 class="fw-bold" style="color: #1E293B;">📚 Modul Lainnya</h4>
        <div class="row mt-3">
            @php
                $otherModuls = \App\Models\ModulPembelajaran::where('id', '!=', $modul->id)->latest()->take(3)->get();
            @endphp

            @forelse($otherModuls as $other)
            <div class="col-md-4 mb-3">
                <div class="card modul-card">
                    <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $other->judul_modul }}</h6>
                        <p class="card-text" style="font-size: 13px; color: #64748B;">
                            <strong>Mata Kuliah:</strong> {{ $other->mata_kuliah }}
                        </p>
                        <a href="{{ route('publik.modul.show', $other->id) }}" class="btn btn-detail btn-sm">
                            <i class="fas fa-eye me-1"></i> Detail
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-muted">Belum ada modul lain.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection