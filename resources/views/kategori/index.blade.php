<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">

    <div class="container mx-auto mt-8 px-4">

        <!-- Tombol kembali -->
        <a href="{{ url('/admin') }}" class="text-gray-600 hover:underline mb-4 inline-block">← Kembali</a>

        <h1 class="text-2xl font-bold mb-4">Daftar Kategori</h1>

        <a href="{{ route('kategori.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Kategori
        </a>

        @if (session('success'))
            <div class="mt-4 text-green-600 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto mt-6">
            <table class="w-full border border-gray-300 text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 border">#</th>
                        <th class="p-2 border">Nama Kategori</th>
                        <th class="p-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategoris as $kategori)
                        <tr class="hover:bg-gray-50">
                            <td class="p-2 border">{{ $loop->iteration }}</td>
                            <td class="p-2 border">{{ $kategori->nama_kategori }}</td>
                            <td class="p-2 border space-x-2">
                                <a href="{{ route('kategori.edit', $kategori) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('kategori.destroy', $kategori) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    @if ($kategoris->isEmpty())
                        <tr>
                            <td colspan="3" class="p-4 text-center text-gray-500">Belum ada kategori tersedia.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
