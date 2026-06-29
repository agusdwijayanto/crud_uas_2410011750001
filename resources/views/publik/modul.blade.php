@extends('layouts.app')
@section('title', 'Modul')

@section('content')

<!-- ===== HEADER ===== -->
<section class="py-5" style="background: linear-gradient(135deg, #EEF2FF 0%, #E0E7FF 100%);">
    <div class="container">
        <div class="text-center">
            <h1 class="fw-bold" style="font-size: 42px; color: #1E293B;">Semua <span style="color: var(--primary-green);">Modul MyModul</span></h1>
            <p class="text-muted" style="font-size: 18px; max-width: 600px; margin: 0 auto;">
                Temukan Sumber Belajar IT Praktis: Rekayasa Web, Basis Data, dan Lainnya.
            </p>

            <!-- Search Bar -->
            <form method="GET" action="/modul" class="mt-4" style="max-width: 600px; margin: 0 auto;">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari Modul, Cari Modul..." value="{{ request('search') }}" style="border-radius: 12px 0 0 12px; border: 2px solid #E2E8F0; padding: 12px 20px;">
                    <button type="submit" class="btn" style="background: var(--primary-green); color: white; border: none; border-radius: 0 12px 12px 0; padding: 12px 24px; font-weight: 600;">
                        🔍 Cari
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- ===== MAIN CONTENT ===== -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">

            <!-- ===== KOLOM KIRI: GRID MODUL (9 kolom) ===== -->
            <div class="col-lg-9">

                <!-- Info Jumlah -->
                <p style="color: #64748B; font-size: 14px; margin-bottom: 20px;">
                    Menampilkan <strong>{{ $moduls->total() }}</strong> modul
                    @if(request()->has('search') || request()->has('mata_kuliah') || request()->has('jenjang') || request()->has('tahun_min'))
                        <span style="color: var(--primary-green);">(difilter)</span>
                    @endif
                </p>

                <!-- Grid 4 Kolom dengan min-height -->
                <div class="row">
                    @forelse($moduls as $modul)
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="card modul-card" style="height: 100%; min-height: 380px; display: flex; flex-direction: column;">

                            <!-- Area Gambar dengan Ikon Teknologi -->
                            <div style="height: 140px; background: #1E293B; display: flex; align-items: center; justify-content: center; color: white; font-size: 40px; border-radius: 16px 16px 0 0; flex-shrink: 0;">

                                @php
                                    $iconMap = [
                                        'Laravel' => 'fab fa-laravel',
                                        'Python' => 'fab fa-python',
                                        'Database' => 'fas fa-database',
                                        'Mobile' => 'fas fa-mobile-alt',
                                        'Statistika' => 'fas fa-chart-bar',
                                        'AI' => 'fas fa-robot',
                                        'Jaringan' => 'fas fa-network-wired',
                                        'Cloud' => 'fas fa-cloud',
                                        'UI/UX' => 'fas fa-paint-brush',
                                        'Web' => 'fas fa-code',
                                        'Pemrograman' => 'fas fa-terminal',
                                        'Keamanan' => 'fas fa-shield-alt',
                                        'Arsitektur' => 'fas fa-sitemap',
                                        'Desain' => 'fas fa-pencil-ruler',
                                    ];
                                    $icon = 'fas fa-book';
                                    foreach ($iconMap as $key => $value) {
                                        if (str_contains($modul->judul_modul, $key) || str_contains($modul->mata_kuliah, $key)) {
                                            $icon = $value;
                                            break;
                                        }
                                    }
                                @endphp

                                @if($modul->gambar)
                                    <img src="{{ asset('storage/'.$modul->gambar) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <i class="{{ $icon }}" style="color: #22C55E; font-size: 48px;"></i>
                                @endif
                            </div>

                            <!-- Body Card -->
                            <div class="card-body" style="padding: 16px; flex: 1; display: flex; flex-direction: column;">

                                <h6 class="card-title fw-bold" style="font-size: 14px; color: #1E293B; margin-bottom: 4px; min-height: 40px;">{{ $modul->judul_modul }}</h6>

                                <p class="card-text" style="font-size: 12px; margin-bottom: 2px; color: #64748B;">
                                    <strong>Mata Kuliah:</strong> {{ $modul->mata_kuliah }}
                                </p>
                                <p class="card-text" style="font-size: 12px; margin-bottom: 2px; color: #64748B;">
                                    <strong>Jenjang:</strong> {{ $modul->jenjang }}
                                </p>
                                <p class="card-text" style="font-size: 12px; margin-bottom: 2px; color: #64748B;">
                                    <strong>Tahun:</strong> {{ $modul->tahun_terbit }}
                                </p>
                                <p class="card-text" style="font-size: 11px; color: #94A3B8; margin-bottom: 12px;">
                                    <strong>Author:</strong> Agus Dwijayanto
                                </p>

                                <!-- Tombol (dipaksa ke bawah dengan mt-auto) -->
                                <div class="d-flex gap-2 mt-auto">
                                    <a href="{{ route('publik.modul.show', $modul->id) }}" class="btn btn-detail btn-sm" style="font-size: 11px; padding: 5px 14px; background: #3B82F6; color: white; border: none; border-radius: 6px;">
                                        <i class="fas fa-eye me-1"></i> Detail
                                    </a>
                                    @if($modul->file)
                                        <a href="{{ asset('storage/'.$modul->file) }}" class="btn btn-download btn-sm" target="_blank" style="font-size: 11px; padding: 5px 14px; background: var(--primary-green); color: white; border: none; border-radius: 6px;">
                                            <i class="fas fa-download me-1"></i> Download File
                                        </a>
                                    @else
                                        <button class="btn btn-sm" disabled style="font-size: 11px; padding: 5px 14px; background: #D1FAE5; color: #065F46; border: none; border-radius: 6px; opacity: 0.7;">
                                            <i class="fas fa-times me-1"></i> No File
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

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $moduls->appends(request()->query())->links() }}
                </div>

            </div>

            <!-- ===== KOLOM KANAN: FILTER SIDEBAR (3 kolom) ===== -->
            <div class="col-lg-3">
                <div class="card modul-card" style="padding: 20px; border-radius: 16px; border: none; box-shadow: 0 4px 16px rgba(0,0,0,0.06);">

                    <h6 class="fw-bold mb-3" style="color: #1E293B;">
                        <i class="fas fa-sliders-h me-2" style="color: var(--primary-green);"></i> Filter Modul
                    </h6>

                    <form method="GET" action="/modul" id="filterForm">
                        <!-- Search tetap dipertahankan -->
                        @foreach(request()->except(['mata_kuliah', 'jenjang', 'tahun_min', 'tahun_max', 'page']) as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach

                        <!-- ===== FILTER MATA KULIAH ===== -->
                        <div class="mb-3">
                            <label class="fw-semibold" style="font-size: 13px; color: #1E293B;">Mata Kuliah</label>
                            @foreach($mataKuliahList as $mk)
                            <div class="form-check mt-1">
                                <input class="form-check-input filter-checkbox" type="checkbox" name="mata_kuliah[]" value="{{ $mk }}" id="mk_{{ Str::slug($mk) }}"
                                    {{ in_array($mk, (array)request('mata_kuliah', [])) ? 'checked' : '' }}
                                    onchange="document.getElementById('filterForm').submit();">
                                <label class="form-check-label" for="mk_{{ Str::slug($mk) }}" style="font-size: 13px; color: #475569;">
                                    {{ $mk }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <!-- ===== FILTER JENJANG ===== -->
                        <div class="mb-3">
                            <label class="fw-semibold" style="font-size: 13px; color: #1E293B;">Jenjang</label>
                            @foreach($jenjangList as $j)
                            <div class="form-check mt-1">
                                <input class="form-check-input filter-checkbox" type="checkbox" name="jenjang[]" value="{{ $j }}" id="j_{{ $j }}"
                                    {{ in_array($j, (array)request('jenjang', [])) ? 'checked' : '' }}
                                    onchange="document.getElementById('filterForm').submit();">
                                <label class="form-check-label" for="j_{{ $j }}" style="font-size: 13px; color: #475569;">
                                    {{ $j }}
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <!-- ===== FILTER TAHUN (Dropdown) ===== -->
                        <div class="mb-3">
                            <label class="fw-semibold" style="font-size: 13px; color: #1E293B;">Tahun Terbit</label>
                            <div class="row g-2 mt-1">
                                <div class="col-6">
                                    <select name="tahun_min" class="form-select form-select-sm" style="border-radius: 8px; border: 2px solid #E2E8F0; font-size: 13px;" onchange="document.getElementById('filterForm').submit();">
                                        <option value="">Min</option>
                                        @for($t = $tahunMax; $t >= $tahunMin; $t--)
                                            <option value="{{ $t }}" {{ request('tahun_min') == $t ? 'selected' : '' }}>{{ $t }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select name="tahun_max" class="form-select form-select-sm" style="border-radius: 8px; border: 2px solid #E2E8F0; font-size: 13px;" onchange="document.getElementById('filterForm').submit();">
                                        <option value="">Max</option>
                                        @for($t = $tahunMax; $t >= $tahunMin; $t--)
                                            <option value="{{ $t }}" {{ request('tahun_max') == $t ? 'selected' : '' }}>{{ $t }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Reset -->
                        <a href="/modul" class="btn btn-outline-secondary w-100" style="border-radius: 8px; padding: 8px; border: 2px solid #E2E8F0; color: #475569; font-size: 13px;">
                            <i class="fas fa-undo me-2"></i> Reset Filter
                        </a>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===== SCRIPT UNTUK AUTO-SUBMIT FILTER ===== -->
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.filter-checkbox, select[name="tahun_min"], select[name="tahun_max"]').forEach(el => {
            el.addEventListener('change', function() {
                document.getElementById('filterForm').submit();
            });
        });
    });
</script>
@endpush

@endsection