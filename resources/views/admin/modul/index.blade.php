@extends('admin.layout')
@section('title', 'Data Modul Pembelajaran')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Modul Pembelajaran</h2>
        <div>
            <a href="{{ route('admin.modul.create') }}" class="btn btn-primary">+ Add Data</a>
            <a href="{{ route('admin.modul.pdf') }}" class="btn btn-secondary">PDF</a>
        </div>
    </div>

    <form method="GET" class="row g-3 mb-3">
        <div class="col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Cari judul/mata kuliah" value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <select name="jenjang" class="form-select">
                <option value="">Semua Jenjang</option>
                <option value="S1" {{ request('jenjang')=='S1' ? 'selected' : '' }}>S1</option>
                <option value="S2" {{ request('jenjang')=='S2' ? 'selected' : '' }}>S2</option>
                <option value="D3" {{ request('jenjang')=='D3' ? 'selected' : '' }}>D3</option>
                <option value="SMA/K" {{ request('jenjang')=='SMA/K' ? 'selected' : '' }}>SMA/K</option>
                <option value="Umum" {{ request('jenjang')=='Umum' ? 'selected' : '' }}>Umum</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route('admin.modul.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul Modul</th>
                    <th>Mata Kuliah</th>
                    <th>Jenjang</th>
                    <th>Tahun</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($moduls as $key => $modul)
                <tr>
                    <td>{{ $moduls->firstItem() + $key }}</td>
                    <td>
                        @if($modul->gambar)
                            <img src="{{ asset('storage/'.$modul->gambar) }}" width="50" height="50" style="object-fit:cover;">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $modul->judul_modul }}</td>
                    <td>{{ $modul->mata_kuliah }}</td>
                    <td>{{ $modul->jenjang }}</td>
                    <td>{{ $modul->tahun_terbit }}</td>
                    <td>
                        @if($modul->file)
                            <a href="{{ asset('storage/'.$modul->file) }}" target="_blank">Download</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.modul.edit', $modul->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('admin.modul.destroy', $modul->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $moduls->appends(request()->query())->links() }}
    </div>
</div>
@endsection