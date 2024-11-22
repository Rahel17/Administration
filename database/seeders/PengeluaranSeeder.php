<?php

namespace Database\Seeders;

use App\Models\Pengeluaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengeluaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengeluaran::create([
            [
            'tanggal' => '2024-01-06',
            'kategori' => 'proposal',
            'uraian' => 'Pemasukan 1',
            'bidang' => 'Inti',
            'nominal' => 10000,
            'penganggungjawab' => 'John Doe',
            'dokumen' => 'proposal.pdf',
            ],

            [
            'tanggal' => '2024-02-20',
            'kategori' => 'sisa_proker',
            'uraian' => 'Pemasukan 2',
            'bidang' => 'Pemberdayaan Sumber Daya Manusia',
            'nominal' => 5000,
            'penganggungjawab' => 'Jane Smith',
            'dokumen' => 'sisa_proker.pdf',
            ],
            
        ]);
    }
}
