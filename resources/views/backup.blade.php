@extends('layouts.app')
@section('title', 'Beranda')
@section('content')
    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold">Laporin!</a>
            <div>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="mr-4">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-white">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-white">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto py-8">
        <section class="bg-white p-8 rounded-lg shadow-md mb-8">
            <h1 class="text-3xl font-bold mb-4">Selamat Datang di Laporin!</h1>
            <p class="text-lg mb-4">Laporin! adalah aplikasi untuk melaporkan masalah warga seperti jalan rusak, lampu mati, atau lainnya kepada RT/RW atau desa secara cepat dan mudah.</p>
            <p class="mb-4"><strong>Tujuan:</strong> Memudahkan komunikasi antara warga dan pengelola lingkungan untuk menyelesaikan masalah secara efisien.</p>
            <p class="mb-4"><strong>Fitur:</strong></p>
            <ul class="list-disc pl-6 mb-4">
                <li>Laporkan masalah dengan form sederhana.</li>
                <li>Lihat daftar laporan terbaru.</li>
                <li>Admin dapat mengelola status dan memberikan tanggapan.</li>
            </ul>
            <a href="{{ route('laporan.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Lapor Sekarang</a>
        </section>

        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Laporan Terbaru</h2>
            @foreach ($laporans as $laporan)
                <div class="bg-white p-4 rounded-lg shadow-md mb-6">
                    <h3 class="text-xl font-semibold">{{ $laporan->judul }}</h3>
                    <p><strong>Lokasi:</strong> {{ $laporan->lokasi }}</p>
                    <p><strong>Tanggal:</strong> {{ $laporan->tanggal }}</p>
                    <p><strong>Kategori:</strong> {{ $laporan->kategori->nama_kategori }}</p>
                    <p><strong>Status:</strong> {{ ucfirst($laporan->status) }}</p>


                    <div class="mt-3">
                        <h4 class="font-semibold">Tanggapan:</h4>
                        @if ($laporan->tanggapans->count() > 0)
                            @foreach ($laporan->tanggapans as $tanggapan)
                                <p>- {{ $tanggapan->isi_tanggapan }}
                                    <small class="text-gray-500">({{ $tanggapan->tanggal_tanggapan }})</small>
                                </p>
                            @endforeach
                        @else
                            <p class="text-gray-500">Belum ada tanggapan.</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </section>

        <section>
            <h2 class="text-2xl font-bold mb-4">Tentang Aplikasi</h2>
            <p>Laporin! dibuat untuk membantu warga melaporkan masalah di lingkungan mereka dengan cepat. Aplikasi ini dirancang sederhana, mudah digunakan, dan mendukung penyelesaian masalah secara transparan.</p>
        </section>
    </main>
@endsection
