@extends('admin.layout')
@section('title', 'Edit Modul')
@section('content')
<div class="container">
    <h2>Edit Modul Pembelajaran</h2>
    <form method="POST" action="{{ route('admin.modul.update', $modul->id) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Judul Modul</label>
            <input type="text" name="judul_modul" class="form-control" value="{{ old('judul_modul', $modul->judul_modul) }}" required>
        </div>
        <div class="mb-3">
            <label>Mata Kuliah</label>
            <input type="text" name="mata_kuliah" class="form-control" value="{{ old('mata_kuliah', $modul->mata_kuliah) }}" required>
        </div>
        <div class="mb-3">
            <label>Jenjang</label>
            <select name="jenjang" class="form-select" required>
                <option value="S1" {{ $modul->jenjang=='S1'?'selected':'' }}>S1</option>
                <option value="S2" {{ $modul->jenjang=='S2'?'selected':'' }}>S2</option>
                <option value="D3" {{ $modul->jenjang=='D3'?'selected':'' }}>D3</option>
                <option value="SMA/K" {{ $modul->jenjang=='SMA/K'?'selected':'' }}>SMA/K</option>
                <option value="Umum" {{ $modul->jenjang=='Umum'?'selected':'' }}>Umum</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Gambar Saat Ini</label>
            @if($modul->gambar)
                <img src="{{ asset('storage/'.$modul->gambar) }}" width="100" class="d-block mb-2"><br>
            @else
                <p class="text-muted">Tidak ada gambar</p>
            @endif
            <label>Ganti Gambar (opsional)</label>
            <input type="file" name="gambar" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label>File Saat Ini</label>
            @if($modul->file)
                <a href="{{ asset('storage/'.$modul->file) }}" target="_blank" class="d-block mb-2">Lihat File</a>
            @else
                <p class="text-muted">Tidak ada file</p>
            @endif
            <label>Ganti File (opsional)</label>
            <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx">
        </div>
        <div class="mb-3">
            <label>Tahun Terbit</label>
            <input type="number" name="tahun_terbit" class="form-control" value="{{ old('tahun_terbit', $modul->tahun_terbit) }}" min="2000" max="{{ date('Y') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection