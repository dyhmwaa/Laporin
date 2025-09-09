<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Semua</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            color: #333;
        }
        h2 {
            text-align: center;
            margin-bottom: 10px;
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px 10px;
            text-align: left;
        }
        th {
            background: #f0f0f0;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background: #fafafa;
        }
        .debug {
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h2>Laporan Warga</h2>

    @if ($laporans->isEmpty())
        <p class="debug">Tidak ada laporan tersedia.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($laporans as $index => $laporan)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $laporan->judul }}</td>
                    <td>{{ optional($laporan->kategori)->nama_kategori ?? 'Tidak ada kategori' }}</td>

                    <td>{{ $laporan->tanggal ? \Carbon\Carbon::parse($laporan->tanggal)->format('d-m-Y') : '-' }}</td>
                    <td>
                        @if ($laporan->status == 'selesai')
                             {{ ucfirst($laporan->status) }}
                        @elseif ($laporan->status == 'diproses')
                             {{ ucfirst($laporan->status) }}
                        @else
                             {{ $laporan->status ?? 'Belum diproses' }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
