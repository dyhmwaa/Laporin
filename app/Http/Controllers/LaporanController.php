<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::with('kategori', 'tanggapans')->latest()->get();
        return view('laporan', compact('laporans'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('laporan-create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'judul' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategoris,id',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        Laporan::create($data);

        return redirect()->route('laporan.success');
    }

    public function success()
    {
        return view('laporan-success');
    }

    
    public function exportPdf()
    {
        $laporans = Laporan::with('kategori', 'tanggapans')->get();
        $pdf = Pdf::loadView('admin.laporan_pdf', compact('laporans'))
            ->setPaper('a4', 'portrait');
        return $pdf->download('laporan_semua.pdf');
    }


    public function exportPdfDetail(Laporan $laporan)
    {
        $laporan->load('kategori', 'tanggapans');
        $pdf = Pdf::loadView('admin.laporan_detail_pdf', compact('laporan'))
            ->setPaper('a4', 'portrait');
        return $pdf->download('laporan_' . $laporan->id . '.pdf');
    }


    public function show(Laporan $laporan)
    {
        $laporan->load('kategori', 'tanggapans');
        return view('laporan-show', compact('laporan'));
    }
}
