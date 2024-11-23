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
        $data = [
            [
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
                'keterangan' => 'lunas',
            ],

            [
                'user_id' => 2,
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
                'keterangan' => 'lunas',
            ],

            [
                'user_id' => 3,
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
                'keterangan' => 'lunas',
            ],

            [
                'user_id' => 4,
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
                'keterangan' => 'lunas',
            ],

            [
                'user_id' => 5,
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
                'keterangan' => 'lunas',
            ],

            [
                'user_id' => 6,
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
                'keterangan' => 'lunas',
            ],

            [
                'user_id' => 7,
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
                'keterangan' => 'lunas',
            ],

            [
                'user_id' => 8,
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
                'keterangan' => 'lunas',
            ],

            [
                'user_id' => 9,
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
                'keterangan' => 'lunas',
            ],  

            [
                'user_id' => 10,
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
                'keterangan' => 'lunas',
            ],

        ];
                
        foreach ($data as $kas) {
            Kas::create($kas);
        }
    }
}
