<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemasukan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'kategori',
        'uraian',
        'bidang',
        'nominal',
        'dokumen',
        'status',
    ];

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }
}
