<?php
namespace App\Http\Controllers;

use App\Models\Laporan;

class HomeController extends Controller
{
    public function index()
    {
        $laporans = Laporan::with('kategori')->latest()->take(3)->get();
        return view('home', compact('laporans'));
    }
}
