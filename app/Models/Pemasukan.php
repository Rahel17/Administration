<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemasukan extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'pemasukans';

    protected $fillable = [
        'tanggal',
        'kategori',
        'uraian',
        'bidang',
        'nominal',
        'penganggungjawab',
        'dokumen',
    ];

    public function saldo(): BelongsTo
    {
        return $this->belongsTo(Saldo::class);
    }

}
