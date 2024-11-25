<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bidang',
        'no_hp',
    ];


    public function user()  {
        return $this->belongsTo(User::class);
    }

    public function kas()  {
        return $this->hasOne(Kas::class);
    }
}
