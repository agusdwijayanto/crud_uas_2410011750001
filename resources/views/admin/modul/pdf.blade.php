<!DOCTYPE html>
<html>
<head>
    <title>Daftar Modul Pembelajaran</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #f2f2f2; }
        img { max-width: 80px; }
    </style>
</head>
<body>
    <h2>Daftar Modul Pembelajaran</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Mata Kuliah</th>
                <th>Jenjang</th>
                <th>Tahun</th>
            </tr>
        </thead>
        <tbody>
            @foreach($moduls as $key => $m)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>
                    @if($m->gambar && Storage::disk('public')->exists($m->gambar))
                        <img src="{{ Storage::disk('public')->path($m->gambar) }}" width="80">
                    @else
                        -
                    @endif
                </td>
                <td>{{ $m->judul_modul }}</td>
                <td>{{ $m->mata_kuliah }}</td>
                <td>{{ $m->jenjang }}</td>
                <td>{{ $m->tahun_terbit }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>