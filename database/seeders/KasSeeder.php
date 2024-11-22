<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kas;

class KasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kas::create([
            'user_id' => 1,
            'bidang' => 'Inti',
            'bulan'=>json_encode([
                'Januari'=>5000,
                'Februari'=>5000,
                'Maret'=>5000,
                'April'=>5000,
                'Mei'=>5000,
                'Juni'=>5000,
                'Juli'=>5000,
                'Agustus'=>5000,
                'September'=>5000,
                'Oktober'=>5000,
            ]),
            'keterangan' => 'lunas'
        ]);
    }
}
