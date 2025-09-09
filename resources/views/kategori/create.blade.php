<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-xl font-bold mb-4">Tambah Kategori</h1>

        <form action="{{ route('kategori.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nama_kategori" class="block font-semibold">Nama Kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori"
                       class="w-full border px-3 py-2 rounded @error('nama_kategori') border-red-500 @enderror"
                       value="{{ old('nama_kategori') }}" required>
                @error('nama_kategori')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('kategori.index') }}" class="text-gray-600 hover:underline">← Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>

</body>
</html>
