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
            'kategori' => 'proposal',
            'uraian' => 'Pemasukan 1',
            'bidang' => 'Inti',
            'nominal' => 10000,
            'penganggungjawab' => 'John Doe',
            'dokumen' => 'proposal.pdf',
        ]);

        Pemasukan::create([
            'tanggal' => '2024-02-20',
            'kategori' => 'sisa_proker',
            'uraian' => 'Pemasukan 2',
            'bidang' => 'Pemberdayaan Sumber Daya Manusia',
            'nominal' => 5000,
            'penganggungjawab' => 'Jane Smith',
            'dokumen' => 'sisa_proker.pdf',
        ]);
    }
}
