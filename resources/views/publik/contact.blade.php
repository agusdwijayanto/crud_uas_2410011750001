@extends('layouts.app')
@section('title', 'Contact')

@section('content')

<!-- ===== CONTACT SECTION (Background Gradien Penuh) ===== -->
<section class="contact-section" style="background: linear-gradient(135deg, #D1FAE5 0%, #DBEAFE 50%, #E0E7FF 100%); padding: 60px 0 40px 0; min-height: 100vh;">

    <div class="container">

        <!-- ===== HEADER ===== -->
        <div class="text-center mb-5">
            <h1 class="fw-bold" style="font-size: 42px; color: #1E293B;">
                Contact <span style="color: var(--primary-green);">MyModul</span>
            </h1>
            <p class="text-muted" style="font-size: 18px; max-width: 600px; margin: 0 auto;">
                Ayo Terhubung! Kritik, Saran, atau Kolaborasi Sangat Kami Nantikan.
            </p>
        </div>

        <!-- ===== NOTIFIKASI SUKSES ===== -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 12px; border-left: 5px solid var(--primary-green);">
                <i class="fas fa-check-circle me-2" style="color: var(--primary-green);"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- ===== GRID 2 KOLOM ===== -->
        <div class="row g-4">

            <!-- ===== KOLOM KIRI: FORM ===== -->
            <div class="col-lg-7">
                <div class="card modul-card" style="padding: 35px 30px; border-radius: 16px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.06); background: rgba(255,255,255,0.9); backdrop-filter: blur(8px);">
                    <h5 class="fw-bold mb-3" style="color: #1E293B;">
                        <i class="fas fa-pen me-2" style="color: var(--primary-green);"></i> Silakan isi formulir di bawah ini:
                    </h5>

                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf

                        <!-- Nama Lengkap -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color: #1E293B;">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap Anda" required style="border-radius: 10px; border: 2px solid #E2E8F0; padding: 12px 16px; background: white;">
                        </div>

                        <!-- Row: Email + Subjek -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color: #1E293B;">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email aktif Anda" required style="border-radius: 10px; border: 2px solid #E2E8F0; padding: 12px 16px; background: white;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="color: #1E293B;">Subjek</label>
                                <input type="text" name="subject" class="form-control" placeholder="Subjek pesan" required style="border-radius: 10px; border: 2px solid #E2E8F0; padding: 12px 16px; background: white;">
                            </div>
                        </div>

                        <!-- Pesan -->
                        <div class="mb-3 mt-3">
                            <label class="form-label fw-semibold" style="color: #1E293B;">Pesan Anda</label>
                            <textarea name="message" class="form-control" rows="5" placeholder="Tuliskan pesan atau pertanyaan Anda di sini..." required style="border-radius: 10px; border: 2px solid #E2E8F0; padding: 12px 16px; background: white;"></textarea>
                        </div>

                        <!-- Tombol Kirim -->
                        <button type="submit" class="btn w-100" style="background: #22C55E; color: white; border: none; border-radius: 10px; padding: 14px; font-weight: 600;">
                            <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>

            <!-- ===== KOLOM KANAN: INFORMASI KONTAK ===== -->
            <div class="col-lg-5">
                <div class="card modul-card" style="padding: 30px 25px; border-radius: 16px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.06); background: rgba(255,255,255,0.9); backdrop-filter: blur(8px);">

                    <!-- Header Info -->
                    <h5 class="fw-bold mb-3" style="color: #1E293B;">
                        <i class="fas fa-address-card me-2" style="color: var(--primary-green);"></i> Informasi Kontak
                    </h5>

                    <!-- Detail Kontak -->
                    <div class="mb-4">
                        <div class="d-flex align-items-start mb-3">
                            <div style="min-width: 36px; height: 36px; background: #F0FDF4; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                                <i class="fas fa-phone" style="color: var(--primary-green); font-size: 16px;"></i>
                            </div>
                            <div>
                                <p style="font-size: 13px; color: #94A3B8; margin-bottom: 0; font-weight: 500;">Telepon</p>
                                <p style="color: #1E293B; font-weight: 500; margin-bottom: 0;">+62 812-3456-7890</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-3">
                            <div style="min-width: 36px; height: 36px; background: #F0FDF4; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                                <i class="fas fa-envelope" style="color: var(--primary-green); font-size: 16px;"></i>
                            </div>
                            <div>
                                <p style="font-size: 13px; color: #94A3B8; margin-bottom: 0; font-weight: 500;">Email</p>
                                <p style="color: #1E293B; font-weight: 500; margin-bottom: 0;">agusdwijayantooo@gmail.com</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start">
                            <div style="min-width: 36px; height: 36px; background: #F0FDF4; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px;">
                                <i class="fas fa-map-marker-alt" style="color: var(--primary-green); font-size: 16px;"></i>
                            </div>
                            <div>
                                <p style="font-size: 13px; color: #94A3B8; margin-bottom: 0; font-weight: 500;">Lokasi</p>
                                <p style="color: #1E293B; font-weight: 500; margin-bottom: 0;">Tangerang Selatan, Indonesia</p>
                            </div>
                        </div>
                    </div>

                    <!-- ===== MAPS ===== -->
                    <div style="border-radius: 12px; overflow: hidden; border: 2px solid #E2E8F0;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.029206926929!2d106.71261531477037!3d-6.248749295482407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1e8f13dd9a5%3A0x42aa1f9464ca86e6!2sUniversitas%20Pamulang!5e0!3m2!1sid!2sid!4v1740663261235!5m2!1sid!2sid"
                            width="100%"
                            height="250"
                            style="border:0; display: block;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

@endsection