<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Daftar Laporan Warga</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }

        .report-card {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .highlighted-report {
            border: 2px solid #f9a8d4; /* pink-300 */
        }
    </style>
</head>

<body class="bg-pink-50">
    <header class="flex items-center justify-between px-6 py-4 bg-white">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-pink-200 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-lg">L!</span>
            </div>
            <h1 class="text-xl font-bold text-gray-900">Laporin!</h1>
        </div>
        <a href="{{ route('home') }}"
            class="bg-pink-400 hover:bg-pink-500 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </header>

    <section class="relative bg-pink-50 pt-8 pb-16 px-6 sm:px-10">
        <h2 class="text-center font-extrabold text-2xl sm:text-3xl text-black max-w-lg mx-auto select-none mb-8">
            Daftar
            <span class="text-pink-300">Laporan</span>
            Warga
        </h2>
    </section>

    <main class="max-w-4xl mx-auto px-6 sm:px-10 space-y-6">
        @if($laporans->isEmpty())
            <div class="bg-white rounded-lg p-12 text-center report-card">
                <div class="mb-6">
                    <i class="fas fa-inbox text-6xl text-pink-300 mb-4"></i>
                    <h3 class="font-bold text-xl text-gray-700 mb-2">Belum Ada Laporan</h3>
                    <p class="text-gray-500 mb-8">Belum ada laporan yang masuk dari warga. Jadilah yang pertama!</p>
                    <a href="{{ route('laporan.create') }}"
                        class="bg-pink-400 hover:bg-pink-500 text-white px-6 py-3 rounded-lg font-semibold transition-colors inline-flex items-center gap-2">
                        <i class="fas fa-plus"></i>
                        Jadi Pelapor Pertama
                    </a>
                </div>
            </div>
        @else
            @foreach($laporans as $index => $laporan)
                <article
                    class="bg-white border {{ $index == 0 ? 'border-2 border-pink-300 highlighted-report' : 'border border-gray-200' }} rounded-lg p-6 report-card">
                    <div class="flex flex-col lg:flex-row gap-6">
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="font-bold text-black text-xl select-none">{{ $laporan->judul }}</h3>
                                <span class="text-xs font-semibold rounded-full px-3 py-1 select-none
                                        @if($laporan->status == 'menunggu') bg-gray-100 text-gray-600
                                        @elseif($laporan->status == 'diproses') bg-yellow-100 text-yellow-600
                                        @else bg-green-100 text-green-600
                                        @endif
                                    ">
                                    @if($laporan->status == 'menunggu') Menunggu
                                    @elseif($laporan->status == 'diproses') Proses
                                    @else Selesai
                                    @endif
                                </span>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-user text-black w-4"></i>
                                    <div>
                                        <p class="text-xs text-gray-500 select-none">Pelapor</p>
                                        <p class="font-semibold text-black select-text">{{ $laporan->nama }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-calendar-alt text-blue-500 w-4"></i>
                                    <div>
                                        <p class="text-xs text-gray-500 select-none">Tanggal Lapor</p>
                                        <p class="text-black select-text">
                                            {{ \Carbon\Carbon::parse($laporan->tanggal)->format('d M Y') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-map-marker-alt text-red-500 w-4"></i>
                                    <div>
                                        <p class="text-xs text-gray-500 select-none">Lokasi</p>
                                        <p class="font-semibold text-black select-text">{{ $laporan->lokasi }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-tag text-yellow-500 w-4"></i>
                                    <div>
                                        <p class="text-xs text-gray-500 select-none">Kategori</p>
                                        <p class="text-black select-text">{{ $laporan->kategori->nama }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($laporan->foto)
                            <div class="lg:w-48 flex-shrink-0">
                                <img alt="Foto laporan {{ $laporan->judul }}" class="rounded-lg object-cover w-full h-32 lg:h-28"
                                    src="{{ asset('storage/' . $laporan->foto) }}" />
                            </div>
                        @endif
                    </div>

                    <div class="mt-4 bg-pink-50 rounded-lg p-4">
                        <div class="flex gap-3">
                            <i class="fas fa-comment-alt text-pink-400 text-sm mt-1"></i>
                            <div class="flex-1">
                                @if($laporan->tanggapans->isNotEmpty())
                                    @php $tanggapan = $laporan->tanggapans->first() @endphp
                                    <p class="text-sm text-gray-600">
                                        <span class="font-semibold text-pink-500 select-none">Tanggapan:</span>
                                        <span class="select-text">{{ $tanggapan->isi_tanggapan }}</span>
                                    </p>
                                    <p class="text-xs text-gray-400 mt-1 select-none">
                                        {{ \Carbon\Carbon::parse($tanggapan->tanggal_tanggapan)->format('d M Y') }}</p>
                                @else
                                    <p class="text-sm text-gray-600">
                                        <span class="font-semibold text-pink-500 select-none">Tanggapan:</span>
                                        <span class="text-pink-300 select-text">Belum ada tanggapan</span>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        @endif
    </main>

    <div class="h-8"></div>

    <!-- Footer Section -->
    <footer class="bg-pink-100">
        <div class="max-w-7xl mx-auto px-6 py-6 flex flex-col sm:flex-row justify-between gap-8 sm:gap-0">
            <div class="flex items-start gap-3 sm:max-w-xs">
                <div class="bg-pink-300 text-white font-bold rounded-lg px-2.5 py-1 text-xs leading-none select-none">
                    L!
                </div>
                <div>
                    <h3 class="font-extrabold text-sm text-black mb-1">
                        Laporin!
                    </h3>
                    <p class="text-gray-600 text-xs leading-relaxed max-w-[220px]">
                        Platform pelaporan digital untuk membantu masyarakat melaporkan berbagai masalah dan keluhan dengan mudah dan cepat.
                    </p>
                </div>
            </div>
            <div class="text-black text-xs leading-relaxed max-w-[220px]">
                <h3 class="font-extrabold mb-1 text-sm">
                    Fitur Utama
                </h3>
                <ul class="list-disc list-inside space-y-1 text-gray-700">
                    <li>
                        Pelaporan Online 24/7
                    </li>
                    <li>
                        Tracking Status Laporan
                    </li>
                    <li>
                        Notifikasi Real-time
                    </li>
                    <li>
                        Dashboard Admin
                    </li>
                </ul>
            </div>
            <div class="text-black text-xs leading-relaxed max-w-[220px]">
                <h3 class="font-extrabold mb-1 text-sm">
                    Kontak
                </h3>
                <ul class="space-y-2 text-gray-700">
                    <li class="flex items-center gap-2">
                        <i class="fas fa-envelope text-pink-400 text-[10px]"></i>
                        <span>
                            admin@laporin.desa.id
                        </span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-phone-alt text-pink-400 text-[10px]"></i>
                        <span>
                            (0331) 123-4567
                        </span>
                    </li>
                    <li class="flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-pink-400 text-[10px]"></i>
                        <span>
                            Kantor Desa Setempat
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>
