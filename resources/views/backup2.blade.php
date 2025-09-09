<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Laporin Dashboard
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
 </head>
 <body class="bg-[#fff5f6] min-h-screen flex flex-col">
  <!-- Header -->
  <header class="bg-white border-b border-[#ffe3e6]">
   <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <nav class="flex items-center justify-between h-14">
     <div class="flex items-center space-x-2">
      <div class="w-8 h-8 rounded-md bg-[#f9d7db] flex items-center justify-center text-[#f9aeb1] font-bold text-lg select-none">
       L!
      </div>
      <span class="font-semibold text-black text-base select-none">
       Laporin!
      </span>
     </div>
     <button class="text-[#f9aeb1] border border-[#f9aeb1] rounded-md px-3 py-1 text-xs font-semibold cursor-default select-none" disabled="">
      ← Kembali
     </button>
    </nav>
   </div>
  </header>
  <!-- Main content -->
  <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-16">
   <h1 class="text-center text-black text-xl sm:text-2xl font-semibold mb-2">
    Dasboard
    <span class="text-[#f9aeb1]">
     Admin
    </span>
   </h1>
   <div class="w-24 h-[3px] bg-[#f9aeb1] mx-auto rounded-full mb-8">
   </div>
   <!-- Cards container -->
   <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Card 1 -->
    <article class="bg-white rounded-xl shadow-md p-4 max-w-sm mx-auto">
     <img alt="Road with many potholes and a truck driving on it" class="rounded-lg mb-3 object-cover w-full h-44" height="180" loading="lazy" src="https://storage.googleapis.com/a1aa/image/fb557ecd-86f5-4d82-9021-b93464c51a30.jpg" width="400"/>
     <div class="flex justify-between mb-2">
      <span class="text-[10px] font-semibold text-[#f9aeb1] bg-[#fce9eb] rounded-full px-2 py-0.5 select-none">
       Umum
      </span>
      <span class="text-[10px] font-semibold text-[#3ecf8e] bg-[#d9f5e4] rounded-full px-2 py-0.5 select-none">
       Selesai
      </span>
     </div>
     <h2 class="font-semibold text-sm text-black mb-1 cursor-default">
      Jalan Rusak Parah
     </h2>
     <p class="text-[11px] text-[#4a4a4a] mb-1 cursor-default">
      Oleh : Dyah Ayu
     </p>
     <p class="text-[11px] text-[#4a4a4a] flex items-center gap-1 mb-3 cursor-default">
      <i class="fas fa-map-marker-alt text-[10px]">
      </i>
      Darungan , Tanggul
     </p>
     <p class="text-[10px] text-[#f9aeb1] font-semibold cursor-pointer select-none">
      Lihat Detail &gt;
     </p>
     <p class="text-[9px] text-[#4a4a4a] mt-2 flex items-center gap-1 cursor-default">
      <i class="far fa-calendar-alt text-[10px]">
      </i>
      24 Jul 2025
     </p>
    </article>
    <!-- Card 2 -->
    <article class="bg-white rounded-xl shadow-md p-4 max-w-sm mx-auto">
     <img alt="People handing over aid package in red and white bags" class="rounded-lg mb-3 object-cover w-full h-44" height="180" loading="lazy" src="https://storage.googleapis.com/a1aa/image/90e091b6-67ea-4612-ad24-5ee0f9d53ffe.jpg" width="400"/>
     <div class="flex justify-between mb-2">
      <span class="text-[10px] font-semibold text-[#f9aeb1] bg-[#fce9eb] rounded-full px-2 py-0.5 select-none">
       Umum
      </span>
      <span class="text-[10px] font-semibold text-[#f9a94f] bg-[#fef9d6] rounded-full px-2 py-0.5 select-none">
       Proses
      </span>
     </div>
     <h2 class="font-semibold text-sm text-black mb-1 cursor-default">
      Bantuan Dikorupsi
     </h2>
     <p class="text-[11px] text-[#4a4a4a] mb-1 cursor-default">
      Oleh : Faiza Tur
     </p>
     <p class="text-[11px] text-[#4a4a4a] flex items-center gap-1 mb-3 cursor-default">
      <i class="fas fa-map-marker-alt text-[10px]">
      </i>
      Manggisan
     </p>
     <p class="text-[10px] text-[#f9aeb1] font-semibold cursor-pointer select-none">
      Lihat Detail &gt;
     </p>
     <p class="text-[9px] text-[#4a4a4a] mt-2 flex items-center gap-1 cursor-default">
      <i class="far fa-calendar-alt text-[10px]">
      </i>
      5 Jul 2025
     </p>
    </article>
    <!-- Card 3 -->
    <article class="bg-white rounded-xl shadow-md p-4 max-w-sm mx-auto">
     <img alt="Various colorful food items in containers" class="rounded-lg mb-3 object-cover w-full h-44" height="180" loading="lazy" src="https://storage.googleapis.com/a1aa/image/43723098-b187-444b-d139-0dcbfc8cfe3e.jpg" width="400"/>
     <div class="flex justify-between mb-2">
      <span class="text-[10px] font-semibold text-[#f9aeb1] bg-[#fce9eb] rounded-full px-2 py-0.5 select-none">
       Umum
      </span>
      <span class="text-[10px] font-semibold text-[#3ecf8e] bg-[#d9f5e4] rounded-full px-2 py-0.5 select-none">
       Selesai
      </span>
     </div>
     <h2 class="font-semibold text-sm text-black mb-1 cursor-default">
      Kenaikan Harga Pangan
     </h2>
     <p class="text-[11px] text-[#4a4a4a] mb-1 cursor-default">
      Oleh : Vanisa Nu
     </p>
     <p class="text-[11px] text-[#4a4a4a] flex items-center gap-1 mb-3 cursor-default">
      <i class="fas fa-map-marker-alt text-[10px]">
      </i>
      Bongsai
     </p>
     <p class="text-[10px] text-[#f9aeb1] font-semibold cursor-pointer select-none">
      Lihat Detail &gt;
     </p>
     <p class="text-[9px] text-[#4a4a4a] mt-2 flex items-center gap-1 cursor-default">
      <i class="far fa-calendar-alt text-[10px]">
      </i>
      24 Jul 2025
     </p>
    </article>
   </section>
  </main>
  <!-- Footer -->
  <footer class="bg-white border-t border-[#ffe3e6]">
   <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-1 sm:grid-cols-3 gap-8 text-[11px] text-[#4a4a4a]">
    <div class="space-y-2">
     <div class="flex items-center space-x-2">
      <div class="w-6 h-6 rounded-md bg-[#f9d7db] flex items-center justify-center text-[#f9aeb1] font-bold text-sm select-none">
       L!
      </div>
      <span class="font-semibold text-black text-sm select-none">
       Laporin!
      </span>
     </div>
     <p class="max-w-xs leading-tight">
      Platform pelaporan digital untuk membantu masyarakat melaporkan berbagai masalah dan keluhan dengan mudah dan cepat.
     </p>
    </div>
    <div>
     <h3 class="font-semibold text-black mb-2 cursor-default">
      Fitur Utama
     </h3>
     <ul class="list-disc list-inside space-y-1">
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
    <div>
     <h3 class="font-semibold text-black mb-2 cursor-default">
      Kontak
     </h3>
     <ul class="space-y-2">
      <li class="flex items-center gap-2">
       <i class="far fa-envelope text-[#4a4a4a]">
       </i>
       <span>
        admin@laporin.desa.id
       </span>
      </li>
      <li class="flex items-center gap-2">
       <i class="fas fa-phone-alt text-[#4a4a4a]">
       </i>
       <span>
        (0331) 123-4567
       </span>
      </li>
      <li class="flex items-center gap-2">
       <i class="fas fa-map-marker-alt text-[#4a4a4a]">
       </i>
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
