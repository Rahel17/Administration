<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Saldo extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'id_pemasukan',
        'id_pengeluaran',
    ];

    public function pemasukan(): HasMany
    {
        return $this->hasMany(Pemasukan::class);
    }

    public function pengeluaran(): HasMany
    {
        return $this->hasMany(Pengeluaran::class);
    }

}
