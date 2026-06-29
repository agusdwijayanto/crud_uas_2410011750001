@extends('layouts.app')
@section('title', 'About')

@section('content')

<!-- ===== ABOUT SECTION (Background Gradien Penuh) ===== -->
<section class="about-section" style="background: linear-gradient(135deg, #D1FAE5 0%, #DBEAFE 50%, #E0E7FF 100%); padding: 60px 0 40px 0; min-height: 100vh;">

    <div class="container">

        <!-- ===== HEADER ===== -->
        <div class="text-center mb-5">
            <h1 class="fw-bold" style="font-size: 42px; color: #1E293B;">About <span style="color: var(--primary-green);">MyModul</span></h1>
            <p class="text-muted" style="font-size: 18px; max-width: 600px; margin: 0 auto;">
                Portofolio Digital &amp; Sumber Belajar IT Praktis
            </p>
        </div>

        <!-- ===== TIMELINE ===== -->
        <div style="position: relative; padding: 20px 0 40px 0;">

            <!-- Garis Timeline -->
            <div style="position: absolute; top: 55px; left: 5%; right: 5%; height: 4px; background: linear-gradient(to right, #3B82F6, #22C55E, #22C55E, #16A34A); border-radius: 4px; z-index: 1;"></div>

            <div class="row text-center" style="position: relative; z-index: 2;">

                <!-- Point 1 -->
                <div class="col-md-3 mb-4">
                    <div style="display: inline-flex; align-items: center; justify-content: center; width: 70px; height: 70px; border-radius: 50%; background: #3B82F6; color: white; font-size: 28px; margin-bottom: 15px; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);">
                        <i class="fas fa-check-double"></i>
                    </div>
                    <h5 class="fw-bold" style="color: #1E293B;">Awal Ide</h5>
                    <p style="color: #94A3B8; font-size: 13px; font-weight: 600;">2024</p>
                    <p style="color: #475569; font-size: 14px; max-width: 220px; margin: 0 auto;">
                        Terinspirasi dari kebutuhan pribadi akan panduan IT yang terstruktur dan sistematis saat kuliah Sistem Informasi.
                    </p>
                </div>

                <!-- Point 2 -->
                <div class="col-md-3 mb-4">
                    <div style="display: inline-flex; align-items: center; justify-content: center; width: 70px; height: 70px; border-radius: 50%; background: #14B8A6; color: white; font-size: 28px; margin-bottom: 15px; box-shadow: 0 4px 12px rgba(20, 184, 166, 0.3);">
                        <i class="fas fa-code"></i>
                    </div>
                    <h5 class="fw-bold" style="color: #1E293B;">Pengembangan Modul</h5>
                    <p style="color: #94A3B8; font-size: 13px; font-weight: 600;">2025</p>
                    <p style="color: #475569; font-size: 14px; max-width: 220px; margin: 0 auto;">
                        Mulai menyusun panduan Praktis (Hands-on) untuk Web Engineering dan Database System, dengan fokus pada studi kasus nyata.
                    </p>
                </div>

                <!-- Point 3 -->
                <div class="col-md-3 mb-4">
                    <div style="display: inline-flex; align-items: center; justify-content: center; width: 70px; height: 70px; border-radius: 50%; background: #22C55E; color: white; font-size: 28px; margin-bottom: 15px; box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <h5 class="fw-bold" style="color: #1E293B;">Peluncuran Publik</h5>
                    <p style="color: #94A3B8; font-size: 13px; font-weight: 600;">2026</p>
                    <p style="color: #475569; font-size: 14px; max-width: 220px; margin: 0 auto;">
                        MyModul diluncurkan sebagai platform terbuka bagi publik untuk belajar mandiri dan mendapatkan akses PDF gratis.
                    </p>
                </div>

                <!-- Point 4 -->
                <div class="col-md-3 mb-4">
                    <div style="display: inline-flex; align-items: center; justify-content: center; width: 70px; height: 70px; border-radius: 50%; background: #16A34A; color: white; font-size: 28px; margin-bottom: 15px; box-shadow: 0 4px 12px rgba(22, 163, 74, 0.3);">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h5 class="fw-bold" style="color: #1E293B;">Portofolio &amp; Visi UAS</h5>
                    <p style="color: #94A3B8; font-size: 13px; font-weight: 600;">2026</p>
                    <p style="color: #475569; font-size: 14px; max-width: 220px; margin: 0 auto;">
                        Dikembangkan oleh Agus Dwijayanto sebagai Portofolio Profesional dan tugas UAS yang berdampak bagi komunitas.
                    </p>
                </div>

            </div>
        </div>

        <!-- ===== PROFIL PENGEMBANG ===== -->
        <div class="row align-items-center mt-4 pt-3" style="border-top: 2px solid rgba(255,255,255,0.5);">

            <div class="col-md-4 text-center">
                <img src="{{ asset('images/profil.jpg') }}" alt="Agus Dwijayanto" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 4px solid var(--primary-green); box-shadow: 0 8px 24px rgba(0,0,0,0.08);">
            </div>

            <div class="col-md-8">
                <h3 class="fw-bold" style="color: #1E293B;">Agus Dwijayanto</h3>
                <p style="color: var(--primary-green); font-weight: 500;">
                    <i class="fas fa-graduation-cap me-2"></i> Mahasiswa Sistem Informasi
                </p>
                <p style="color: #475569; font-size: 15px; line-height: 1.8;">
                    Saya adalah mahasiswa Sistem Informasi di Universitas Pamulang. MyModul adalah hasil dari
                    perjalanan belajar saya yang saya dedikasikan untuk membantu mahasiswa dan publik mengakses
                    materi IT yang praktis dan terstruktur.
                </p>
                <div class="d-flex gap-3 mt-3 flex-wrap">
                    <a href="/modul" class="btn btn-download" style="padding: 10px 24px; border-radius: 10px;">
                        <i class="fas fa-book me-2"></i> Lihat Modul
                    </a>
                    <a href="/contact" class="btn btn-outline-secondary" style="border-radius: 10px; padding: 10px 24px; border: 2px solid #E2E8F0; color: #475569;">
                        <i class="fas fa-envelope me-2"></i> Hubungi
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection