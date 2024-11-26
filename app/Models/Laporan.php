<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemasukan_id',
        'pengeluaran_id',
        'kas_id',
        'tanggal',
    ];

    public function pemasukan()
    {
        return $this->belongsTo(Pemasukan::class);
    }

    public function pengeluaran()   
    {
        return $this->belongsTo(Pengeluaran::class);
    }
}
