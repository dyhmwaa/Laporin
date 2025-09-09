<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Detail</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .section { margin-bottom: 15px; }
        .label { font-weight: bold; }
        .photo { max-width: 300px; height: auto; margin-top: 10px; border: 1px solid #ccc; }
        .debug { color: red; font-style: italic; }
    </style>
</head>
<body>
    <h2>Detail Laporan #{{ $laporan->id }}</h2>

    <div class="section"><span class="label">Judul:</span> {{ $laporan->judul }}</div>
    <div class="section"><span class="label">Nama:</span> {{ $laporan->nama }}</div>
    <div class="section"><span class="label">Alamat:</span> {{ $laporan->alamat }}</div>
    <div class="section"><span class="label">Lokasi:</span> {{ $laporan->lokasi }}</div>
    <div class="section"><span class="label">Tanggal:</span> {{ $laporan->tanggal ? \Carbon\Carbon::parse($laporan->tanggal)->format('d-m-Y') : '-' }}</div>

    {{-- ✅ Kategori --}}
    <div class="section"><span class="label">Kategori:</span>
        {{ optional($laporan->kategori)->nama_kategori ?? 'Tidak ada kategori' }}
    </div>

    <div class="section"><span class="label">Deskripsi:</span> {{ $laporan->deskripsi }}</div>

    {{-- ✅ Foto --}}
    <div class="section">
        <span class="label">Foto:</span><br>
        @if ($laporan->foto)
            <img src="{{ public_path('storage/' . $laporan->foto) }}" alt="Foto Laporan" class="photo">
        @else
            <span class="debug">Tidak ada foto tersedia</span>
        @endif
    </div>

    {{-- ✅ Tanggapan --}}
    <h3>Tanggapan</h3>
    <ul>
        @forelse($laporan->tanggapans as $tanggapan)
            <li>{{ $tanggapan->isi }}
                (oleh {{ $tanggapan->user->name ?? 'Admin' }})
            </li>
        @empty
            <li>Belum ada tanggapan</li>
        @endforelse
    </ul>
</body>
</html>
