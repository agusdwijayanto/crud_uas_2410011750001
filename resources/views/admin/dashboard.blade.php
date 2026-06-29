@extends('admin.layout')
@section('title', 'Dashboard')

@section('content')

<!-- ===== WELCOME ===== -->
<div class="welcome">
    Selamat Datang Kembali, <span>{{ Auth::user()->name ?? 'Agus' }}</span>!
</div>

<!-- ===== STAT CARDS ===== -->
<div class="row g-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-book"></i></div>
            <div class="stat-number">{{ $totalModulAktif ?? 0 }}</div>
            <div class="stat-label">Total Modul Aktif</div>
            <div class="stat-change up">Tumbuh 12% bulan ini</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-plus-circle"></i></div>
            <div class="stat-number">{{ $modulBaruBulanIni ?? 0 }}</div>
            <div class="stat-label">Modul Baru Bulan Ini</div>
            <div class="stat-change up">7 materi Rekayasa Web</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-download"></i></div>
            <div class="stat-number">{{ $totalUnduhan ?? 0 }}</div>
            <div class="stat-label">Total Unduhan Modul</div>
            <div class="stat-change up">+5% hari ini</div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-user-shield"></i></div>
            <div class="stat-number">{{ $totalUserAdmin ?? 0 }}</div>
            <div class="stat-label">User Admin Terdaftar</div>
            <div class="stat-change">Akses Terkendali</div>
        </div>
    </div>
</div>

<!-- ===== TABLE MODUL TERBARU ===== -->
<div class="table-container">
    <div class="table-title">📋 Data Modul Terbaru</div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID Modul</th>
                    <th>Judul Modul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($moduls as $modul)
                <tr>
                    <td>M{{ str_pad($modul->id, 3, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $modul->judul_modul }}</td>
                    <td>{{ $modul->mata_kuliah }}</td>
                    <td>{{ Auth::user()->name ?? 'Agus Dwijayanto' }}</td>
                    <td>
                        <span class="badge-status {{ $modul->status == 'active' ? 'active' : 'archived' }}">
                            {{ $modul->status == 'active' ? 'Aktif' : 'Arsip' }}
                        </span>
                    </td>
                    <td>
                        <div class="action-btns">
                            <a href="{{ route('admin.modul.edit', $modul->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.modul.destroy', $modul->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus modul ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                            <a href="{{ route('publik.modul.show', $modul->id) }}" class="btn btn-info btn-sm" target="_blank">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada modul.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ===== ACTIVITY LOG ===== -->
<div class="activity-log">
    <div class="activity-title">🕒 Aktivitas Login Terakhir</div>
    <div class="activity-item">
        <div class="avatar">
            {{ substr(Auth::user()->name ?? 'AD', 0, 2) }}
        </div>
        <div class="info">
            <div class="name">{{ Auth::user()->name ?? 'Agus Dwijayanto' }}</div>
            <div class="desc">Logged in to dashboard</div>
        </div>
        <div class="time">{{ $lastLogin ?? '10 minutes ago' }} • Jakarta</div>
    </div>
</div>

@endsection