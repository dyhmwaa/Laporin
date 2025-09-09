<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $fillable = ['laporan_id', 'isi_tanggapan', 'tanggal_tanggapan'];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }
}
