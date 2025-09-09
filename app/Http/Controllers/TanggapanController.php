<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TanggapanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'laporan_id'     => 'required|exists:laporans,id',
            'isi_tanggapan'  => 'required|string',
        ]);

        Tanggapan::create([
            'laporan_id'       => $request->laporan_id,
            'isi_tanggapan'    => $request->isi_tanggapan,
            'tanggal_tanggapan'=> Carbon::now(), // otomatis isi tanggal & waktu sekarang
        ]);

        return back()->with('success', 'Tanggapan berhasil ditambahkan!');
    }

    public function destroy(Tanggapan $tanggapan)
    {
        $tanggapan->delete();
        return back()->with('success', 'Tanggapan berhasil dihapus!');
    }
}
