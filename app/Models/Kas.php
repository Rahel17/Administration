<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bidang',
        'bulan',
        'bukti',
        'keterangan',
        'is_approved', // Tambahan untuk status persetujuan
    ];

    protected $casts = [
        'bulan' => 'array', // Cast JSON ke array otomatis
        'is_approved' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'user_id', 'user_id');
    }

    // Getter untuk mendapatkan bidang melalui relasi anggota
    public function getBidangAttribute()
    {
        return $this->anggota ? $this->anggota->bidang : null;
    }
}
