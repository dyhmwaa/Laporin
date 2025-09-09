<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporin! - Platform Pelaporan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .bg-pink-custom {
            background-color: #fce7f3;
        }

        .text-pink-custom {
            color: #f472b6;
        }

        .bg-pink-button {
            background-color: #f472b6;
        }

        .border-pink-custom {
            border-color: #f472b6;
        }

        .hover-pink:hover {
            background-color: #ec4899;
        }

        .hover-pink-light:hover {
            background-color: #fdf2f8;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #f8bbd9 0%, #FFBFC5 50%, #f8bbd9 100%);
        }
    </style>
</head>

<body class="bg-white">
    <!-- Header -->
    <header class="flex items-center justify-between px-6 py-4 lg:px-16">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-pink-200 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold text-lg">L!</span>
            </div>
            <h1 class="text-xl font-bold text-gray-900">Laporin!</h1>
        </div>
        <nav class="hidden md:flex gap-8 text-sm text-gray-600">
            <a href="#beranda" class="hover:text-gray-900 transition">Beranda</a>
            <a href="#fitur" class="hover:text-gray-900 transition">Fitur</a>
            <a href="#laporan" class="hover:text-gray-900 transition">Laporan</a>
            <a href="#tentang" class="hover:text-gray-900 transition">Tentang</a>
            <a href="#kontak" class="hover:text-gray-900 transition">Kontak</a>

            @guest
                {{-- Kalau belum login tampil Login --}}
                <a href="{{ route('login') }}" class="hover:text-gray-900 transition">Login</a>
            @endguest

            @auth
                {{-- Kalau sudah login (admin) tampil Dashboard + Logout --}}
                <a href="{{ url('/admin') }}" class="hover:text-gray-900 transition">Dashboard</a>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-gray-900 transition">Logout</button>
                </form>
            @endauth
        </nav>


    </header>

    <!-- Hero Section -->
    <section id="beranda" style="position: relative;" class="bg-pink-custom relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-16 py-16">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <!-- Left Content -->
                <div class="lg:w-1/2">
                    <h2 class="text-4xl lg:text-5xl mt-10 font-bold leading-tight mb-6">
                        <span class="text-pink-custom">Laporkan Masalah,</span><br>
                        <span class="text-gray-800">Wujudkan<br>Perubahan</span>
                    </h2>
                    <p class="text-gray-600 mb-8 max-w-md">
                        Platform digital untuk melaporkan berbagai keluhan dan masalah lingkungan Anda. Cepat, aman, dan
                        transparan
                    </p>
                    <div class="flex gap-4 mb-10">
                        <a href="{{ route('laporan.create') }}"
                            class="bg-pink-button text-white px-6 py-3 rounded-md font-medium hover-pink transition">
                            + Buat Laporan
                        </a>
                        <a href="{{ route('laporan') }}"
                            class="border border-pink-custom text-pink-custom px-6 py-3 rounded-md font-medium hover-pink-light transition">
                            👁 Lihat Semua Laporan
                        </a>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="lg:w-1/2 flex justify-center lg:justify-end">
                    <img style="width:560px; position: absolute; right: 0; top:0;"
                        src="{{ asset('images/gedang.png') }}" alt="Hero Image">
                </div>
            </div>
        </div>

        <!-- Background Circles -->
        <div class="absolute bottom-0 right-0 -mb-32 -mr-32 w-64 h-64 bg-pink-300 rounded-full opacity-30"></div>
        <div class="absolute bottom-0 right-0 -mb-48 -mr-48 w-96 h-96 bg-pink-200 rounded-full opacity-20"></div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="max-w-7xl mx-auto px-6 lg:px-16 py-20">
        <h3 class="text-center text-4xl font-bold mb-4">
            Tentang <span class="text-pink-custom">Laporin!</span>
        </h3>
        <p class="text-center text-gray-600 max-w-3xl mx-auto mb-16">
            Aplikasi Laporin dibuat untuk menjembatani komunikasi antara masyarakat dan pemerintah desa dalam menangani
            berbagai keluhan, aspirasi, dan saran pembangunan.
        </p>

        <div class="flex flex-col lg:flex-row items-center gap-16">
            <!-- Left - Government Digital Box -->
            <div class="lg:w-1/3">
                <div class="border border-pink-200 rounded-2xl p-12 text-center bg-white shadow-sm">
                    <div class="w-16 h-16 bg-pink-100 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-file-alt text-2xl text-pink-custom"></i>
                    </div>
                    <h4 class="font-bold text-gray-900 text-lg">
                        Pemerintah Desa<br>Digital
                    </h4>
                </div>
            </div>

            <!-- Right - Features -->
            <div class="lg:w-2/3 space-y-8">
                <div class="flex items-start gap-6">
                    <div class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-users text-xl text-pink-custom"></i>
                    </div>
                    <div>
                        <h5 class="font-bold text-gray-900 text-lg mb-2">Untuk Masyarakat</h5>
                        <p class="text-gray-600">
                            Memberikan wadah bagi masyarakat untuk menyampaikan aspirasi dan keluhan dengan mudah dan
                            efisien.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-6">
                    <div class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-eye text-xl text-pink-custom"></i>
                    </div>
                    <div>
                        <h5 class="font-bold text-gray-900 text-lg mb-2">Transparansi</h5>
                        <p class="text-gray-600">
                            Memastikan setiap laporan diproses secara transparan dan dapat dipertanggungjawabkan kepada
                            publik.
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-6">
                    <div class="w-12 h-12 bg-pink-100 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-bolt text-xl text-pink-custom"></i>
                    </div>
                    <div>
                        <h5 class="font-bold text-gray-900 text-lg mb-2">Responsif</h5>
                        <p class="text-gray-600">
                            Sistem yang responsif dengan notifikasi real-time untuk memastikan setiap laporan mendapat
                            perhatian.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Cara Kerja Section -->
    <section id="fitur" class="bg-pink-50 pt-16 pb-20 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-xl mx-auto mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Cara <span class="text-pink-custom">Kerja</span>
                </h2>
                <p class="text-gray-600">
                    Proses pelaporan yang mudah dan transparan dalam 3 langkah sederhana
                </p>
            </div>

            <!-- Steps -->
            <div class="flex flex-col lg:flex-row justify-center items-center gap-16 lg:gap-20 mb-16">
                <!-- Step 1 -->
                <div class="flex flex-col items-center max-w-xs text-center">
                    <div
                        class="w-20 h-20 rounded-full bg-pink-200 text-white font-bold text-2xl flex items-center justify-center shadow-lg mb-6">
                        1
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-3">
                        Buat Laporan
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Isi formulir laporan dengan detail keluhan atau aspirasi Anda. Sertakan foto dan lokasi untuk
                        memperjelas laporan yang disampaikan.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="flex flex-col items-center max-w-xs text-center">
                    <div
                        class="w-20 h-20 rounded-full bg-yellow-500 text-white font-bold text-2xl flex items-center justify-center shadow-lg mb-6">
                        2
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-3">
                        Proses Verifikasi
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Tim admin akan memverifikasi dan memproses laporan Anda dengan cepat. Anda akan mendapat kode
                        tracking untuk melacak progress laporan.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="flex flex-col items-center max-w-xs text-center">
                    <div
                        class="w-20 h-20 rounded-full bg-green-500 text-white font-bold text-2xl flex items-center justify-center shadow-lg mb-6">
                        3
                    </div>
                    <h3 class="font-bold text-lg text-gray-900 mb-3">
                        Dapatkan Tanggapan
                    </h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Terima tanggapan dan solusi dari pihak terkait secara transparan. Status laporan akan diupdate
                        secara real-time hingga tuntas.
                    </p>
                </div>
            </div>

            <!-- Feature Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 max-w-5xl mx-auto">
                <div class="bg-white border border-pink-200 rounded-lg p-6 text-center">
                    <i class="fas fa-clock text-pink-custom text-2xl mb-4"></i>
                    <h4 class="font-bold text-gray-900 mb-2">24/7 Online</h4>
                    <p class="text-sm text-gray-600">Akses kapan saja dari mana saja</p>
                </div>

                <div class="bg-white border border-pink-200 rounded-lg p-6 text-center">
                    <i class="fas fa-shield-alt text-pink-custom text-2xl mb-4"></i>
                    <h4 class="font-bold text-gray-900 mb-2">Aman & Terpercaya</h4>
                    <p class="text-sm text-gray-600">Data terlindungi dengan enkripsi</p>
                </div>

                <div class="bg-white border border-pink-200 rounded-lg p-6 text-center">
                    <i class="fas fa-bolt text-pink-custom text-2xl mb-4"></i>
                    <h4 class="font-bold text-gray-900 mb-2">Respon Cepat</h4>
                    <p class="text-sm text-gray-600">Tanggapan dalam 1x24 jam</p>
                </div>

                <div class="bg-white border border-pink-200 rounded-lg p-6 text-center">
                    <i class="fas fa-chart-bar text-pink-custom text-2xl mb-4"></i>
                    <h4 class="font-bold text-gray-900 mb-2">Tracking Real-time</h4>
                    <p class="text-sm text-gray-600">Pantau status laporan Anda</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Laporan Terbaru Section -->
    <section id="laporan" class="bg-white py-20 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Laporan <span class="text-pink-custom">Terbaru</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Berikut adalah laporan-laporan terbaru yang telah diterima dari masyarakat
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @forelse($laporans as $laporan)
                    <!-- Report Card -->
                    <div
                        class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition">
                        @if($laporan->foto)
                            <img src="{{ asset('storage/' . $laporan->foto) }}" alt="{{ $laporan->judul }}"
                                class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-image text-gray-400 text-4xl"></i>
                            </div>
                        @endif

                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <span class="bg-[#F2AAAF] text-[#B22234] text-xs font-medium px-3 py-1 rounded-full">
                                    {{ $laporan->kategori->nama_kategori ?? 'Umum' }}
                                </span>

                                <span class="text-xs font-medium px-3 py-1 rounded-full
                                                    @if($laporan->status == 'selesai') bg-green-100 text-green-600
                                                    @elseif($laporan->status == 'diproses') bg-yellow-100 text-yellow-600
                                                    @else bg-gray-100 text-gray-600
                                                    @endif">
                                    {{ ucfirst($laporan->status) }}
                                </span>
                            </div>

                            <h3 class="font-bold text-lg text-gray-900 mb-2">
                                {{ Str::limit($laporan->judul, 30) }}
                            </h3>

                            <p class="text-sm text-gray-600 mb-2">
                                Oleh: {{ $laporan->nama ?? 'Anonim' }}
                            </p>


                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="fas fa-map-marker-alt text-pink-custom"></i>
                                <span>{{ $laporan->lokasi }}</span>
                            </div>

                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-4">
                                <i class="fas fa-calendar-alt text-pink-custom"></i>
                                <span>{{ $laporan->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- No Reports Card -->
                    <div class="col-span-full text-center py-16">
                        <i class="fas fa-inbox text-gray-300 text-6xl mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-500 mb-2">Belum Ada Laporan</h3>
                        <p class="text-gray-400 mb-6">Jadilah yang pertama membuat laporan</p>
                        <a href="{{ route('laporan.create') }}"
                            class="bg-pink-button text-white px-6 py-3 rounded-md font-medium hover-pink transition inline-block">
                            Buat Laporan Pertama
                        </a>
                    </div>
                @endforelse
            </div>

            @if($laporans->count() > 0)
                <div class="text-center">
                    <a href="{{ route('laporan') }}"
                        class="bg-[#FFC5CA] text-white px-8 py-3 rounded-full font-medium hover:bg-[#fdaeb5] transition">
                        Lihat Semua Laporan →
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="gradient-bg relative overflow-hidden min-h-[400px] flex items-center justify-center">
        <div class="max-w-4xl mx-auto px-6 py-16 text-center relative z-10">
            <h2 class="text-white font-bold text-3xl sm:text-4xl md:text-5xl leading-tight mb-6">
                Siap Membuat Laporan?
            </h2>
            <p class="text-white/90 text-sm sm:text-base md:text-lg max-w-2xl mx-auto leading-relaxed mb-8">
                Suara Anda sangat penting bagi kami. Mari bersama-sama membangun lingkungan yang lebih baik melalui
                partisipasi aktif dalam pelaporan keluhan dan aspirasi masyarakat.
            </p>
            <a href="{{ route('laporan.create') }}"
                class="bg-white/20 backdrop-blur-sm border border-white/30 text-white text-sm sm:text-base font-semibold rounded-lg px-6 py-3 inline-flex items-center justify-center gap-2 hover:bg-white/30 transition-all duration-300">
                <i class="fas fa-pen"></i>
                Mulai Buat Laporan
            </a>
        </div>

        <!-- Decorative circles -->
        <div class="absolute top-10 right-10 w-20 h-20 bg-white/10 rounded-full"></div>
        <div class="absolute bottom-16 left-16 w-16 h-16 bg-white/10 rounded-full"></div>
        <div class="absolute left-8 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/10 rounded-full"></div>
        <div class="absolute right-1/4 bottom-20 w-8 h-8 bg-white/10 rounded-full"></div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="bg-gray-50 py-16 px-6 ml-10">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

                <!-- Laporin Section -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3 mb-6">
                        <div
                            class="bg-pink-100 text-pink-600 rounded-full w-10 h-10 flex items-center justify-center font-bold text-sm">
                            L!
                        </div>
                        <h3 class="font-bold text-lg text-gray-900">
                            Laporin!
                        </h3>
                    </div>
                    <p class="text-gray-600 leading-relaxed text-sm">
                        Platform pelaporan digital untuk membantu masyarakat melaporkan berbagai masalah dan keluhan
                        dengan mudah dan cepat.
                    </p>
                </div>

                <!-- Fitur Utama Section -->
                <div class="space-y-4 ml-7">
                    <h4 class="font-bold text-lg text-gray-900 mb-6">
                        Fitur Utama
                    </h4>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-2 text-sm text-gray-600">
                            <span class="text-pink-500 mt-1">•</span>
                            Pelaporan Online 24/7
                        </li>
                        <li class="flex items-start gap-2 text-sm text-gray-600">
                            <span class="text-pink-500 mt-1">•</span>
                            Tracking Status Laporan
                        </li>
                        <li class="flex items-start gap-2 text-sm text-gray-600">
                            <span class="text-pink-500 mt-1">•</span>
                            Notifikasi Real-time
                        </li>
                        <li class="flex items-start gap-2 text-sm text-gray-600">
                            <span class="text-pink-500 mt-1">•</span>
                            Dashboard Admin
                        </li>
                    </ul>
                </div>

                <!-- Kontak Section -->
                <div class="space-y-4">
                    <h4 class="font-bold text-lg text-gray-900 mb-6">
                        Kontak
                    </h4>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-sm text-gray-600">
                            <i class="fas fa-envelope text-pink-500 w-4"></i>
                            <a class="hover:text-pink-600 transition-colors" href="mailto:admin@laporin.desa.id">
                                admin@laporin.desa.id
                            </a>
                        </li>
                        <li class="flex items-center gap-3 text-sm text-gray-600">
                            <i class="fas fa-phone-alt text-pink-500 w-4"></i>
                            <span>(0331) 123-4567</span>
                        </li>
                        <li class="flex items-center gap-3 text-sm text-gray-600">
                            <i class="fas fa-map-marker-alt text-pink-500 w-4"></i>
                            <span>Kantor Desa Setempat</span>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-200 mt-12 pt-8 text-center">
                <p class="text-sm text-gray-500">
                    © 2025 Laporin! - Platform Pelaporan Digital Desa. Semua hak dilindungi.
                </p>
            </div>
        </div>
    </footer>

    <!-- Smooth Scrolling Script -->
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>

</html>
