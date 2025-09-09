<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::create(['nama_kategori' => 'Jalan']);
        Kategori::create(['nama_kategori' => 'Listrik']);
        Kategori::create(['nama_kategori' => 'Air']);
        Kategori::create(['nama_kategori' => 'Lainnya']);
    }
}
