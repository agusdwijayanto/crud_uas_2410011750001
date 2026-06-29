@extends('admin.layout')
@section('title', 'Tambah Modul')
@section('content')
<div class="container">
    <h2>Tambah Modul Pembelajaran</h2>
    <form method="POST" action="{{ route('admin.modul.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul Modul</label>
            <input type="text" name="judul_modul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mata Kuliah</label>
            <input type="text" name="mata_kuliah" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jenjang</label>
            <select name="jenjang" class="form-select" required>
                <option value="">Pilih Jenjang</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="D3">D3</option>
                <option value="SMA/K">SMA/K</option>
                <option value="Umum">Umum</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Gambar (jpeg, png, jpg, max 2MB)</label>
            <input type="file" name="gambar" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label>File Modul (pdf, doc, docx, max 5MB)</label>
            <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx">
        </div>
        <div class="mb-3">
            <label>Tahun Terbit</label>
            <input type="number" name="tahun_terbit" class="form-control" min="2000" max="{{ date('Y') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection