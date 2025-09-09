<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Laporin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-[#fff5f6] min-h-screen flex flex-col">
    <!-- Header -->
    <header class="bg-white border-b border-[#ffe3e6]">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            <nav class="flex items-center justify-between h-20">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 rounded-md bg-[#f9d7db] flex items-center justify-center text-[#f9aeb1] font-bold text-2xl select-none">
                        L!
                    </div>
                    <span class="font-semibold text-black text-2xl select-none">
                        Laporin!
                    </span>
                </div>
                <a href="{{ route('home') }}" class="text-[#f9aeb1] border border-[#f9aeb1] rounded-md px-6 py-3 text-base font-semibold hover:bg-[#f9aeb1] hover:text-white transition-colors duration-300">
                    ← Kembali
                </a>
            </nav>
        </div>
    </header>

    <!-- Main content -->
    <main class="flex-grow max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 pt-12 pb-24">
        <h1 class="text-center text-black text-3xl sm:text-4xl font-semibold mb-4">
            Dasboard
            <span class="text-[#f9aeb1]">
                Admin
            </span>
        </h1>
        <div class="w-32 h-[4px] bg-[#f9aeb1] mx-auto rounded-full mb-8"></div>

        <!-- Success Message -->
        @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 p-6 rounded-2xl mb-8 max-w-5xl mx-auto">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-3 text-green-600 text-lg"></i>
                <span class="text-base">{{ session('success') }}</span>
            </div>
        </div>
        @endif

        <!-- Cards container -->
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($laporans as $laporan)
            <!-- Card - Made more rounded -->
            <article class="bg-white rounded-2xl shadow-md p-6 max-w-md mx-auto">
                @if($laporan->foto)
                <img alt="{{ $laporan->judul }}" class="rounded-2xl mb-4 object-cover w-full h-56" height="224" loading="lazy" src="{{ asset('storage/' . $laporan->foto) }}" width="400"/>
                @else
                <div class="rounded-2xl mb-4 bg-gray-200 w-full h-56 flex items-center justify-center">
                    <i class="fas fa-image text-gray-400 text-3xl"></i>
                </div>
                @endif

                <div class="flex justify-between mb-4">
                    <span class="text-sm font-semibold text-[#f9aeb1] bg-[#fce9eb] rounded-full px-4 py-2 select-none">
                        {{ $laporan->kategori->nama_kategori }}
                    </span>
                    <span class="text-sm font-semibold
                        @if($laporan->status == 'selesai') text-[#3ecf8e] bg-[#d9f5e4]
                        @elseif($laporan->status == 'proses') text-[#f9a94f] bg-[#fef9d6]
                        @else text-[#f9aeb1] bg-[#fce9eb] @endif
                        rounded-full px-4 py-2 select-none">
                        {{ ucfirst($laporan->status) }}
                    </span>
                </div>

                <h2 class="font-semibold text-lg text-black mb-3 cursor-default">
                    {{ $laporan->judul }}
                </h2>

                <p class="text-base text-[#4a4a4a] mb-2 cursor-default">
                    Oleh : {{ $laporan->nama }}
                </p>

                <p class="text-base text-[#4a4a4a] flex items-center gap-2 mb-4 cursor-default">
                    <i class="fas fa-map-marker-alt text-sm"></i>
                    {{ $laporan->lokasi }}
                </p>

                <a href="{{ route('admin.laporan.show', $laporan) }}" class="text-base text-[#f9aeb1] font-semibold cursor-pointer select-none hover:text-[#f898a4] transition-colors duration-300">
                    Lihat Detail &gt;
                </a>

                <p class="text-sm text-[#4a4a4a] mt-3 flex items-center gap-2 cursor-default">
                    <i class="far fa-calendar-alt text-sm"></i>
                    {{ \Carbon\Carbon::parse($laporan->tanggal)->format('d M Y') }}
                </p>

                <!-- Tampilkan tanggapan jika ada -->
                @if($laporan->tanggapans->count())
                <div class="mt-4 p-4 bg-[#fce9eb] rounded-2xl">
                    <p class="text-sm text-[#f9aeb1] font-semibold mb-2">Tanggapan Terbaru:</p>
                    <p class="text-sm text-[#4a4a4a]">{{ Str::limit($laporan->tanggapans->last()->isi_tanggapan, 50) }}</p>
                </div>
                @endif
            </article>
            @endforeach

            <!-- Empty State - Also made more rounded -->
            @if ($laporans->isEmpty())
            <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center py-20">
                <div class="bg-white rounded-3xl shadow-md p-12 max-w-lg mx-auto">
                    <div class="w-20 h-20 bg-[#fce9eb] rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-inbox text-[#f9aeb1] text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-black mb-3">Belum Ada Laporan</h3>
                    <p class="text-[#4a4a4a] text-lg">Laporan akan muncul di sini ketika sudah ada yang mengirim.</p>
                </div>
            </div>
            @endif
        </section>

        <!-- Tombol di bawah kiri dan kanan -->
        <div class="mt-12 mb-8 flex justify-start space-x-6">
            <a href="{{ route('admin.laporan.exportPdf') }}" class="inline-flex items-center bg-[#f9aeb1] text-white px-8 py-4 rounded-md text-base font-semibold hover:bg-[#f898a4] transition-colors duration-300">
                <i class="fas fa-file-pdf mr-3 text-lg"></i>
                Export PDF
            </a>
            <a href="{{ route('kategori.index') }}" class="inline-flex items-center bg-[#f9aeb1] text-white px-8 py-4 rounded-md text-base font-semibold hover:bg-[#f898a4] transition-colors duration-300">
                <i class="fas fa-plus mr-3 text-lg"></i>
                Kelola Kategori
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-[#ffe3e6]">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 py-12 grid grid-cols-1 sm:grid-cols-3 gap-12 text-base text-[#4a4a4a]">
            <div class="space-y-4">
                <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 rounded-md bg-[#f9d7db] flex items-center justify-center text-[#f9aeb1] font-bold text-lg select-none">
                        L!
                    </div>
                    <span class="font-semibold text-black text-lg select-none">
                        Laporin!
                    </span>
                </div>
                <p class="max-w-sm leading-relaxed text-base">
                    Platform pelaporan digital untuk membantu masyarakat melaporkan berbagai masalah dan keluhan dengan mudah dan cepat.
                </p>
            </div>
            <div>
                <h3 class="font-semibold text-black mb-4 cursor-default text-lg">
                    Fitur Utama
                </h3>
                <ul class="list-disc list-inside space-y-2">
                    <li>Pelaporan Online 24/7</li>
                    <li>Tracking Status Laporan</li>
                    <li>Notifikasi Real-time</li>
                    <li>Dashboard Admin</li>
                </ul>
            </div>
            <div>
                <h3 class="font-semibold text-black mb-4 cursor-default text-lg">
                    Kontak
                </h3>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3">
                        <i class="far fa-envelope text-[#4a4a4a]"></i>
                        <span>admin@laporin.desa.id</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone-alt text-[#4a4a4a]"></i>
                        <span>(0331) 123-4567</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-map-marker-alt text-[#4a4a4a]"></i>
                        <span>Kantor Desa Setempat</span>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>