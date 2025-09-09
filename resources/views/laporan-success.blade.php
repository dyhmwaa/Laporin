<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        Laporan Berhasil Dikirim
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-[#ffe6e6] min-h-screen flex items-center justify-center p-6">
    <div
        class="bg-white rounded-3xl shadow-[10px_10px_15px_rgba(0,0,0,0.1)] max-w-md w-full p-8 relative min-h-[400px] flex flex-col justify-center">
        <div class="w-20 h-20 bg-[#fbb6b6] rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-check text-white text-4xl"></i>
        </div>
        <h1 class="text-center text-2xl font-extrabold mb-2">
            Laporan <span class="text-[#fbb6b6]">Berhasil</span> Dikirim
        </h1>
        <p class="text-gray-400 text-sm leading-relaxed text-center mt-2">
            Terima kasih atas laporan Anda. <br />
            Tim kami akan segera memproses dan menindaklanjuti <br />
            laporan yang telah Anda kirimkan.
        </p>

        <div class="flex justify-center gap-4 flex-wrap mt-6">
            <a href="{{ route('laporan') }}"
                class="flex items-center gap-2 bg-[#f87e7e] text-white font-medium text-sm rounded-full py-2 px-5 hover:bg-[#f87e7e]/90 transition">
                <i class="fas fa-file-alt text-base"></i>
                <span>Lihat semua Laporan</span>
            </a>


            <a href="{{ route('home') }}"
                class="flex items-center gap-2 border border-[#f87e7e] text-[#f87e7e] font-medium text-sm rounded-full py-2 px-5 hover:bg-[#f87e7e]/10 transition">
                <img src="https://cdn-icons-png.flaticon.com/512/69/69524.png" alt="Home Icon" width="18" height="18"
                    class="inline-block" />
                <span>Kembali ke Beranda</span>
            </a>

        </div>

        <div class="w-12 h-12 bg-[#fef6f6] rounded-full absolute top-6 right-6"></div>
    </div>

</body>

</html>
