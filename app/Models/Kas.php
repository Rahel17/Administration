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
        'keterangan',
    ];


    public function user()  {
        return $this->belongsTo(User::class);
    }
}
