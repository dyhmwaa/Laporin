<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Laporin!</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
        .shake {
            animation: shake 0.6s ease-in-out;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        .error-border {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }
        .error-message {
            animation: slideDown 0.3s ease-out;
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="bg-[#FDE8E8] min-h-screen">
    <div class="max-w-3xl mx-auto bg-white min-h-screen">
        <!-- Header -->
        <header class="flex items-center space-x-4 p-6 bg-white">
            <div class="bg-[#FDE2E2] text-[#F87E7E] font-bold text-lg rounded-xl px-4 py-2">
                L!
            </div>
            <h1 class="font-bold text-2xl text-black">
                Laporin!
            </h1>
        </header>

        <!-- Main Content -->
        <div class="bg-[#FDE8E8] px-8 pb-8" style="position: relative;">
            <div class="bg-[#FDE8E8]"
                style="width:100px; height: 100px; position: absolute; border-radius: 100%; top: -20px; margin: 0 auto;">
            </div>

            <!-- Title Section -->
            <div class="text-center py-8">
                <h2 class="font-bold text-4xl text-black mb-4">
                    Lapor <span class="text-[#F87E7E]">Sekarang</span>
                </h2>
                <p class="text-base text-gray-600 max-w-lg mx-auto leading-relaxed">
                    Platform digital untuk melaporkan berbagai keluhan dan masalah lingkungan Anda.
                    Cepat, aman, dan transparan
                </p>
            </div>

            <!-- Step Indicators -->
            <div class="flex justify-center items-center space-x-16 mb-10" style="position: relative">
                <div class="flex flex-col items-center">
                    <div
                        class="w-16 h-16 rounded-full bg-[#F87E7E] text-white font-bold flex justify-center items-center text-lg relative">
                        <div
                            class="absolute inset-0 w-20 h-20 -top-2 -left-2 rounded-full bg-[#F87E7E] opacity-20 blur-md">
                        </div>
                        <span class="relative z-10">1</span>
                    </div>
                    <span class="text-sm text-[#F87E7E] mt-3 font-semibold">Data Pelapor</span>
                </div>
                <div class="flex flex-col items-center">
                    <div
                        class="w-16 h-16 rounded-full bg-[#F9C74F] text-white font-bold flex justify-center items-center text-lg relative">
                        <div
                            class="absolute inset-0 w-20 h-20 -top-2 -left-2 rounded-full bg-[#F9C74F] opacity-20 blur-md">
                        </div>
                        <span class="relative z-10">2</span>
                    </div>
                    <span class="text-sm text-[#B8860B] mt-3 font-semibold">Detail Laporan</span>
                </div>
                <div class="flex flex-col items-center">
                    <div
                        class="w-16 h-16 rounded-full bg-[#90C695] text-white font-bold flex justify-center items-center text-lg relative">
                        <div
                            class="absolute inset-0 w-20 h-20 -top-2 -left-2 rounded-full bg-[#90C695] opacity-20 blur-md">
                        </div>
                        <span class="relative z-10">3</span>
                    </div>
                    <span class="text-sm text-[#4A5D4A] mt-3 font-semibold">Kirim</span>
                </div>
            </div>

            <!-- Pesan Error Global -->
            @if ($errors->any())
                <div id="global-error" class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg error-message">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <span id="global-error-text">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </span>
                    </div>
                </div>
            @endif

            <!-- Form -->
            <form id="reportForm" action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Data Pelapor Section -->
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center space-x-3 mb-6">
                        <i class="far fa-user text-[#F87E7E] text-lg"></i>
                        <h3 class="font-bold text-gray-800 text-lg">Data Pelapor</h3>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <i class="fas fa-user absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap anda"
                                    class="w-full border border-pink-200 rounded-lg py-3 pl-12 pr-4 text-base placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-pink-300 @error('nama') error-border @enderror" />
                            </div>
                            @error('nama')
                                <div id="nama-error" class="text-red-500 text-sm mt-1 error-message">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Alamat Lengkap <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <i class="fas fa-map-marker-alt absolute left-4 top-4 text-gray-400"></i>
                                <textarea id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat domisili lengkap"
                                    class="w-full border border-pink-200 rounded-lg py-3 pl-12 pr-4 text-base placeholder-gray-400 resize-none focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-pink-300 @error('alamat') error-border @enderror">{{ old('alamat') }}</textarea>
                            </div>
                            @error('alamat')
                                <div id="alamat-error" class="text-red-500 text-sm mt-1 error-message">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Detail Laporan Section -->
                <div class="bg-white rounded-xl p-6 shadow-lg">
                    <div class="flex items-center space-x-3 mb-6">
                        <i class="far fa-file-alt text-[#F87E7E] text-lg"></i>
                        <h3 class="font-bold text-gray-800 text-lg">Detail Laporan</h3>
                    </div>

                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Judul Laporan <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-file-alt absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="text" id="judul" name="judul" value="{{ old('judul') }}" placeholder="Contoh: Jalan Rusak Depan RT 03"
                                        class="w-full border border-pink-200 rounded-lg py-3 pl-12 pr-4 text-base placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-pink-300 @error('judul') error-border @enderror" />
                                </div>
                                @error('judul')
                                    <div id="judul-error" class="text-red-500 text-sm mt-1 error-message">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                          <div>
    <label class="block text-sm font-semibold text-gray-700 mb-2">
        Kategori Masalah <span class="text-red-500">*</span>
    </label>
    <select id="kategori" name="kategori_id"
        class="w-full border border-pink-200 rounded-lg py-3 px-4 text-gray-700 focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-pink-300 @error('kategori_id') error-border @enderror">
        <option value="" disabled {{ old('kategori_id') ? '' : 'selected' }}>Pilih kategori masalah</option>
        @foreach ($kategoris as $kategori)
            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                {{ $kategori->nama_kategori }}
            </option>
        @endforeach
    </select>
    @error('kategori_id')
        <div id="kategori-error" class="text-red-500 text-sm mt-1 error-message">
            <i class="fas fa-exclamation-circle mr-1"></i>
            {{ $message }}
        </div>
    @enderror
</div>
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Lokasi Kejadian <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <i class="fas fa-map-marker-alt absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" placeholder="Lokasi spesifik tempat kejadian"
                                        class="w-full border border-pink-200 rounded-lg py-3 pl-12 pr-4 text-base placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-pink-300 @error('lokasi') error-border @enderror" />
                                </div>
                                @error('lokasi')
                                    <div id="lokasi-error" class="text-red-500 text-sm mt-1 error-message">
                                        <i class="fas fa-exclamation-circle mr-1"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div>
    <label class="block text-sm font-semibold text-gray-700 mb-2">
        Tanggal Kejadian <span class="text-red-500">*</span>
    </label>
    <div class="relative">
        <i class="fas fa-calendar absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        <input type="date" id="tanggal" name="tanggal"
            value="{{ date('Y-m-d') }}" readonly
            class="w-full border border-pink-200 rounded-lg py-3 px-4 pr-12 text-base bg-gray-100 text-gray-600 cursor-not-allowed focus:outline-none" />
    </div>
    @error('tanggal')
        <div id="tanggal-error" class="text-red-500 text-sm mt-1 error-message">
            <i class="fas fa-exclamation-circle mr-1"></i>
            {{ $message }}
        </div>
    @enderror
</div>

                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Deskripsi Detail
                            </label>
                            <textarea id="deskripsi" name="deskripsi" rows="4"
                                placeholder="Jelaskan secara detail masalah yang ingin di laporkan. Semakin detail, semakin membantu proses penanganan"
                                class="w-full border border-pink-200 rounded-lg py-3 px-4 text-base placeholder-gray-400 resize-none focus:outline-none focus:ring-2 focus:ring-pink-300 focus:border-pink-300 @error('deskripsi') error-border @enderror">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div id="deskripsi-error" class="text-red-500 text-sm mt-1 error-message">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Foto Pendukung <span class="text-red-500">*</span>
                            </label>
                            <label for="upload" id="upload-area"
                                class="flex flex-col items-center justify-center border-2 border-dashed border-pink-200 rounded-lg py-12 cursor-pointer hover:bg-pink-50 transition-colors @error('foto') error-border @enderror">
                                <i class="fas fa-image text-4xl text-gray-400 mb-3"></i>
                                <span class="text-lg text-gray-600 mb-2">Klik Untuk Upload Foto</span>
                                <span class="text-sm text-gray-400">atau drag and drop file PNG, JPG hingga 2MB</span>
                                <input id="upload" name="foto" type="file" accept=".png,.jpg,.jpeg" class="hidden" />
                            </label>
                            @error('foto')
                                <div id="foto-error" class="text-red-500 text-sm mt-1 error-message">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    {{ $message }}
                                </div>
                            @else
                                <div id="foto-error" class="hidden text-red-500 text-sm mt-1 error-message">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    Foto pendukung wajib diupload
                                </div>
                            @endif
                            <div id="foto-success" class="hidden text-green-600 text-sm mt-1">
                                <i class="fas fa-check-circle mr-1"></i>
                                <span id="foto-name">File berhasil diupload</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Section -->
                <div class="bg-[radial-gradient(circle_at_center,_#FFBFC5,_#FFD6DA,_#FFBFC5)] rounded-xl p-8 text-center">
                    <h4 class="font-bold text-white text-2xl mb-2">Siap Mengirim Laporan?</h4>
                    <p class="text-white text-base mb-6">Pastikan semua data yang Anda masukkan sudah benar</p>

                    <div class="flex space-x-4 justify-center">
                        <button type="submit" id="submit-btn"
                            class="flex items-center space-x-3 bg-white text-pink-500 font-bold px-6 py-3 rounded-lg hover:bg-pink-50 transition-colors text-base disabled:opacity-50 disabled:cursor-not-allowed"
                            disabled>
                            <i class="fas fa-paper-plane"></i>
                            <span>Kirim Laporan</span>
                        </button>
                        <button type="button" onclick="window.history.back()"
                            class="flex items-center space-x-3 border-2 border-white text-white font-bold px-6 py-3 rounded-lg hover:bg-white hover:text-pink-500 transition-colors text-base">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali</span>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Footer -->
            <footer class="w-full bg-white border-t border-gray-200 px-8 py-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <div class="flex items-center space-x-3 mb-2">
                            <div class="bg-pink-200 text-pink-500 font-bold text-base rounded-xl px-3 py-2">
                                L!
                            </div>
                            <h1 class="font-bold text-black text-lg">Laporin!</h1>
                        </div>
                        <p class="text-sm text-gray-600">
                            Platform pelaporan digital untuk membantu masyarakat melaporkan berbagai masalah dan
                            keluhan dengan mudah dan cepat.
                        </p>
                    </div>
                    <div>
                        <h5 class="font-bold text-gray-800 mb-4 text-base">Fitur Utama</h5>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li>• Pelaporan Online 24/7</li>
                            <li>• Tracking Status Laporan</li>
                            <li>• Notifikasi Real-time</li>
                            <li>• Dashboard Admin</li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="font-bold text-gray-800 mb-4 text-base">Kontak</h5>
                        <ul class="space-y-2 text-sm text-gray-600">
                            <li>📧 admin@laporin.desa.id</li>
                            <li>📞 (0333) 123-4567</li>
                            <li>🏢 Kantor Desa Setempat</li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('reportForm');
            const submitBtn = document.getElementById('submit-btn');
            const globalError = document.getElementById('global-error');
            const uploadInput = document.getElementById('upload');
            const uploadArea = document.getElementById('upload-area');

            // Validasi real-time saat user mengetik/memilih
            const requiredFields = [
                { id: 'nama', errorId: 'nama-error', message: 'Nama lengkap wajib diisi' },
                { id: 'alamat', errorId: 'alamat-error', message: 'Alamat lengkap wajib diisi' },
                { id: 'judul', errorId: 'judul-error', message: 'Judul laporan wajib diisi' },
                { id: 'kategori', errorId: 'kategori-error', message: 'Kategori masalah wajib dipilih' },
                { id: 'lokasi', errorId: 'lokasi-error', message: 'Lokasi kejadian wajib diisi' },
                { id: 'tanggal', errorId: 'tanggal-error', message: 'Tanggal kejadian wajib diisi' }
            ];

            // Fungsi untuk menghapus error
            function clearError(field) {
                const input = document.getElementById(field.id);
                const error = document.getElementById(field.errorId);

                input.classList.remove('error-border', 'shake');
                error.classList.add('hidden');
            }

            // Fungsi untuk menampilkan error
            function showError(field) {
                const input = document.getElementById(field.id);
                const error = document.getElementById(field.errorId);

                input.classList.add('error-border', 'shake');
                error.classList.remove('hidden');

                setTimeout(() => {
                    input.classList.remove('shake');
                }, 600);
            }

            // Fungsi untuk memeriksa apakah semua field wajib sudah terisi
            function checkFormValidity() {
                let isValid = true;

                requiredFields.forEach(field => {
                    const input = document.getElementById(field.id);
                    if (!input.value.trim()) {
                        isValid = false;
                    }
                });

                if (!uploadInput.files[0]) {
                    isValid = false;
                }

                submitBtn.disabled = !isValid;
            }

            // Event listener untuk setiap field
            requiredFields.forEach(field => {
                const input = document.getElementById(field.id);

                input.addEventListener('input', function() {
                    if (this.value.trim() !== '') {
                        clearError(field);
                    }
                    checkFormValidity();
                });

                input.addEventListener('change', function() {
                    if (this.value.trim() !== '') {
                        clearError(field);
                    }
                    checkFormValidity();
                });
            });

            // Handle file upload
            uploadInput.addEventListener('change', function() {
                const file = this.files[0];
                const fotoError = document.getElementById('foto-error');
                const fotoSuccess = document.getElementById('foto-success');
                const fotoName = document.getElementById('foto-name');

                if (file) {
                    // Validasi tipe file
                    const allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];
                    if (!allowedTypes.includes(file.type)) {
                        fotoError.textContent = 'Format file harus PNG, JPG, atau JPEG';
                        fotoError.classList.remove('hidden');
                        fotoSuccess.classList.add('hidden');
                        uploadArea.classList.add('error-border');
                        this.value = '';
                        checkFormValidity();
                        return;
                    }

                    // Validasi ukuran file (2MB sesuai controller)
                    if (file.size > 2 * 1024 * 1024) {
                        fotoError.innerHTML = '<i class="fas fa-exclamation-circle mr-1"></i>Ukuran file maksimal 2MB';
                        fotoError.classList.remove('hidden');
                        fotoSuccess.classList.add('hidden');
                        uploadArea.classList.add('error-border');
                        this.value = '';
                        checkFormValidity();
                        return;
                    }

                    // File valid
                    fotoError.classList.add('hidden');
                    fotoSuccess.classList.remove('hidden');
                    fotoName.textContent = file.name + ' berhasil diupload';
                    uploadArea.classList.remove('error-border');
                } else {
                    fotoSuccess.classList.add('hidden');
                }
                checkFormValidity();
            });

            // Drag and drop untuk upload
            uploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.classList.add('bg-pink-50');
            });

            uploadArea.addEventListener('dragleave', function(e) {
                e.preventDefault();
                this.classList.remove('bg-pink-50');
            });

            uploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('bg-pink-50');

                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    uploadInput.files = files;
                    uploadInput.dispatchEvent(new Event('change'));
                }
            });

            // Initial check untuk memastikan tombol disabled saat halaman dimuat
            checkFormValidity();
        });
    </script>
</body>

</html>
