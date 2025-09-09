<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Detail Laporan
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Inter', sans-serif;
    }
  </style>
 </head>
 <body class="bg-white text-gray-900">
 <header class="bg-white border-b border-[#ffe3e6]">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <nav class="flex items-center justify-between h-16">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-md bg-[#f9d7db] flex items-center justify-center text-[#f9aeb1] font-bold text-xl select-none">
                    L!
                </div>
                <span class="font-semibold text-black text-xl select-none">
                    Laporin!
                </span>
            </div>
        </nav>
    </div>
</header>

  @if (session('success'))
  <div class="max-w-7xl mx-auto px-8 pt-6">
    <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded text-lg">
      {{ session('success') }}
    </div>
  </div>
  @endif

  <main class="max-w-7xl mx-auto px-8 py-12 flex flex-col md:flex-row gap-12">
   <section class="flex-1 rounded-xl border border-pink-200 overflow-hidden">
    <div class="bg-pink-100 rounded-t-xl px-8 py-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4 md:gap-0">
     <div>
      <h2 class="font-semibold text-white text-pink-900 text-xl md:text-2xl">
       {{ $laporan->judul }}
      </h2>
      @php
        $statusClass = '';
        switch($laporan->status) {
          case 'menunggu':
            $statusClass = 'bg-yellow-300 text-yellow-700';
            break;
          case 'diproses':
            $statusClass = 'bg-blue-300 text-blue-700';
            break;
          case 'selesai':
            $statusClass = 'bg-green-300 text-green-700';
            break;
          default:
            $statusClass = 'bg-pink-300 text-pink-700';
        }
      @endphp
      <span class="inline-block mt-2 {{ $statusClass }} text-sm font-semibold rounded-full px-4 py-1 select-none">
       {{ ucfirst($laporan->status) }}
      </span>
     </div>
     <div class="text-right text-sm md:text-base">
      <p class="font-semibold text-pink-900">
       Kategori
      </p>
      <p class="font-bold text-black">
       {{ $laporan->kategori->nama_kategori }}
      </p>
     </div>
    </div>
    <div class="border border-t-0 border-pink-200 px-8 py-8 space-y-8">
     <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-6 gap-x-8">
      <div class="flex items-center gap-4">
       <i class="far fa-user text-pink-300 text-2xl">
       </i>
       <div>
        <p class="text-sm font-semibold text-pink-900">
         Pelapor
        </p>
        <p class="text-lg font-semibold">
         {{ $laporan->nama }}
        </p>
       </div>
      </div>
      <div class="flex items-center gap-4">
       <i class="fas fa-map-marker-alt text-pink-300 text-2xl">
       </i>
       <div>
        <p class="text-sm font-semibold text-pink-900">
         Alamat Pelapor
        </p>
        <p class="text-lg font-semibold">
         {{ $laporan->alamat }}
        </p>
       </div>
      </div>
      <div class="flex items-center gap-4">
       <i class="fas fa-map-pin text-pink-300 text-2xl">
       </i>
       <div>
        <p class="text-sm font-semibold text-pink-900">
         Lokasi Kejadian
        </p>
        <p class="text-lg font-semibold">
         {{ $laporan->lokasi }}
        </p>
       </div>
      </div>
      <div class="flex items-center gap-4">
       <i class="far fa-calendar-alt text-pink-300 text-2xl">
       </i>
       <div>
        <p class="text-sm font-semibold text-pink-900">
         Tanggal Kejadian
        </p>
        <p class="text-lg font-semibold">
         {{ $laporan->tanggal }}
        </p>
       </div>
      </div>
     </div>
     <div>
      <p class="text-sm font-semibold text-pink-300 inline-block mb-2">
       Deskripsi
       <span class="text-black font-semibold">
        Laporan :
       </span>
      </p>
      <p class="bg-gray-200 rounded-md px-4 py-3 text-base text-gray-700 max-w-xl">
       {{ $laporan->deskripsi }}
      </p>
     </div>
     <div>
      <p class="text-lg font-semibold mb-4">
       Dokumentasi
      </p>
      @if ($laporan->foto)
        <img alt="Foto Laporan" class="rounded-md" height="150" src="{{ asset('storage/' . $laporan->foto) }}" width="300"/>
      @else
        <div class="bg-gray-200 rounded-md w-[300px] h-[150px] flex items-center justify-center text-gray-500 text-lg">
          <span>Tidak ada foto</span>
        </div>
      @endif
     </div>
     <div class="bg-gray-200 rounded-md p-8 mt-8 flex flex-col items-center text-center text-gray-500 max-w-xl mx-auto">
      <div class="flex items-center gap-3 mb-4">
       <i class="fas fa-comments text-2xl">
       </i>
       <p class="text-pink-300 font-semibold text-xl">
        Tanggapan
       </p>
      </div>
      @if ($laporan->tanggapans->count() > 0)
        <div class="w-full space-y-3">
          @foreach ($laporan->tanggapans as $tanggapan)
            <div class="bg-white rounded-md p-4 text-left">
              <p class="text-base text-gray-700">{{ $tanggapan->isi_tanggapan }}</p>
              <p class="text-sm text-gray-500 mt-2">{{ $tanggapan->tanggal_tanggapan }}</p>
            </div>
          @endforeach
        </div>
      @else
        <p class="text-lg font-semibold">
         Belum ada tanggapan
        </p>
        <p class="text-sm">
         tambahkan tanggapan untuk laporan ini
        </p>
      @endif
     </div>
    </div>
   </section>
   <aside class="flex flex-col gap-8 w-full max-w-sm">
    <form action="{{ route('admin.laporan.updateStatus', $laporan) }}" method="POST" class="border border-pink-200 rounded-md p-6 space-y-4">
     @csrf
     @method('PUT')
     <p class="text-pink-300 text-sm font-semibold flex items-center gap-2">
      <i class="fas fa-sync-alt">
      </i>
      Update Status
     </p>
     <label class="text-sm font-semibold text-gray-700 block mb-2" for="status1">
      Status laporan
     </label>
     <select class="w-full rounded-md border border-pink-300 text-pink-900 text-sm font-semibold px-4 py-2 focus:outline-none focus:ring-1 focus:ring-pink-300" id="status1" name="status">
      <option value="menunggu" {{ $laporan->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
      <option value="diproses" {{ $laporan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
      <option value="selesai" {{ $laporan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
     </select>
     <button class="w-full bg-pink-500 hover:bg-pink-600 text-white text-sm font-semibold rounded-md py-3" type="submit">
      Update Status
     </button>
    </form>
    <form action="{{ route('admin.laporan.storeTanggapan', $laporan) }}" method="POST" class="border border-pink-200 rounded-md p-6 space-y-4">
     @csrf
     <input type="hidden" name="laporan_id" value="{{ $laporan->id }}">
     <p class="text-pink-300 text-sm font-semibold flex items-center gap-2">
      <i class="fas fa-plus">
      </i>
      Tambah Tanggapan
     </p>
     <label class="text-sm font-semibold text-gray-700 block mb-2" for="isi_tanggapan">
      Tanggapan
     </label>
     <textarea class="w-full rounded-md border border-pink-300 text-pink-900 text-sm font-semibold px-4 py-3 resize-none focus:outline-none focus:ring-1 focus:ring-pink-300 @error('isi_tanggapan') border-red-500 @enderror" id="isi_tanggapan" name="isi_tanggapan" placeholder="Tulis tanggapan untuk laporan ini" rows="4"></textarea>
     @error('isi_tanggapan')
       <p class="text-red-500 text-sm">{{ $message }}</p>
     @enderror
     <button class="w-full bg-pink-500 hover:bg-pink-600 text-white text-sm font-semibold rounded-md py-3" type="submit">
      Kirim Tanggapan
     </button>
    </form>
    <div class="border border-pink-200 rounded-md p-6 space-y-4">
     <p class="text-pink-300 text-sm font-semibold">
      Aksi Laporan :
     </p>
     <a href="{{ route('admin.laporan.exportPdfDetail', $laporan->id) }}" class="w-full bg-pink-300 hover:bg-pink-400 text-pink-900 text-sm font-semibold rounded-md py-3 flex items-center justify-center gap-2">
      <i class="fas fa-file-export">
      </i>
      Export pdf
     </a>
     <form action="{{ route('admin.laporan.destroy', $laporan) }}" method="POST" class="w-full">
       @csrf
       @method('DELETE')
       <button type="submit" class="w-full bg-pink-500 hover:bg-pink-600 text-pink-100 text-sm font-semibold rounded-md py-3 flex items-center justify-center gap-2" onclick="return confirm('Yakin ingin menghapus laporan ini?')">
        <i class="fas fa-trash-alt">
        </i>
        Hapus Laporan
       </button>
     </form>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="bg-gray-300 text-gray-700 text-sm font-semibold rounded-full py-2 px-6 self-center flex items-center gap-2">
     <i class="fas fa-chevron-left text-sm">
     </i>
     Kembali ke Dashboard
    </a>
   </aside>
  </main>
 </body>
</html>