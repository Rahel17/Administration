<?php

namespace Database\Seeders;

use App\Models\Pemasukan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemasukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemasukan::create([
            'tanggal' => '2024-01-15',
            'kategori' => 'lainnya',
            'uraian' => 'Sisa uang kepengurusan Himatif 2023',
            'bidang' => 'Inti',
            'nominal' => 3803333,
            'penganggungjawab' => 'Putri Kartika (Informatika 20)',
        ]);

        Pemasukan::create([
            'tanggal' => '2024-01-15',
            'kategori' => 'lainnya',
            'uraian' => 'Peminjaman lampu',
            'bidang' => 'Inti',
            'nominal' => 100000,
            'penganggungjawab' => 'Resyaliana (Informatika 22)',
        ]);
    }
}
