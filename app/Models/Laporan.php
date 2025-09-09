<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'nama', 'alamat', 'judul', 'lokasi', 'tanggal',
        'kategori_id', 'deskripsi', 'foto', 'status'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class);
    }
}   
