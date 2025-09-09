<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $laporans = Laporan::with('kategori', 'tanggapans')->latest()->get();
        return view('admin.dashboard', compact('laporans'));
    }

    public function show(Laporan $laporan)
    {
        $laporan->load('kategori', 'tanggapans');
        return view('admin.laporan-show', compact('laporan'));
    }

    public function updateStatus(Request $request, Laporan $laporan)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai',
        ]);

        $laporan->update(['status' => $request->status]);
        return redirect()->route('admin.laporan.show', $laporan)->with('success', 'Status berhasil diperbarui.');
    }

    public function storeTanggapan(Request $request, Laporan $laporan)
    {
        $request->validate([
            'isi_tanggapan' => 'required|string',
        ]);

        Tanggapan::create([
            'laporan_id' => $laporan->id,
            'isi_tanggapan' => $request->isi_tanggapan,
            'tanggal_tanggapan' => now(),
        ]);

        return redirect()->route('admin.laporan.show', $laporan)->with('success', 'Tanggapan berhasil ditambahkan.');
    }

    public function destroy(Laporan $laporan)
    {
        if ($laporan->foto && Storage::disk('public')->exists($laporan->foto)) {
            Storage::disk('public')->delete($laporan->foto);
        }

        $laporan->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Laporan berhasil dihapus.');
    }
}
