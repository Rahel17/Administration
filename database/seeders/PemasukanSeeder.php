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
        $data = [
            [
                'tanggal' => '2024-01-15',
                'kategori' => 'lainnya',
                'uraian' => 'Sisa uang kepengurusan Himatif 2023',
                'bidang' => 'Inti',
                'nominal' => 3803333,
                'penanggungjawab' => 'Putri Kartika (Informatika 20)',
            ],
            [
                'tanggal' => '2024-01-15',
                'kategori' => 'lainnya',
                'uraian' => 'Peminjaman lampu',
                'bidang' => 'Inti',
                'nominal' => 100000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],
            [
                'tanggal' => '2024-03-15',
                'kategori' => 'lainnya',
                'uraian' => 'Peminjaman infokus dan layar',
                'bidang' => 'Inti',
                'nominal' => 120000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],
            [
                'tanggal' => '2024-03-18',
                'kategori' => 'lainnya',
                'uraian' => 'Sisa rapat kerja Himatif 2023-2024',
                'bidang' => 'Inti',
                'nominal' => 5600,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],
            [
                'tanggal' => '2024-04-17',
                'kategori' => 'sisa_proker',
                'uraian' => 'Sisa kegiatan SABDA',
                'bidang' => 'Kerohanian',
                'nominal' => 1000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],
            [
                'tanggal' => '2024-04-17',
                'kategori' => 'sisa_proker',
                'uraian' => 'Sisa kegiatan bukber',
                'bidang' => 'Kerohanian',
                'nominal' => 129200,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],
            [
                'tanggal' => '2024-04-30',
                'kategori' => 'sisa_proker',
                'uraian' => 'Sisa kegiatan CHROME IX',
                'bidang' => 'PSDM',
                'nominal' => 43500,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],  
            [
                'tanggal' => '2024-05-02',
                'kategori' => 'lainnya',
                'uraian' => 'Peminjaman layar dan infokus',
                'bidang' => 'Inti',
                'nominal' => 150000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],  
            [
                'tanggal' => '2024-05-17',
                'kategori' => 'proposal',
                'uraian' => 'Pencairan proposal CHROME IX',
                'bidang' => 'PSDM',
                'nominal' => 2000000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],  
            [
                'tanggal' => '2024-06-11',
                'kategori' => 'sisa_proker',
                'uraian' => 'Sisa IT peduli',
                'bidang' => 'Humas',
                'nominal' => 18500,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],
            [
                'tanggal' => '2024-06-14',
                'kategori' => 'sisa_proker',
                'uraian' => 'Sisa kegiatan arak-arakan wisudawan periode 106',
                'bidang' => 'PSDM',
                'nominal' => 1000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],
            [
                'tanggal' => '2024-06-14',
                'kategori' => 'sisa_proker',
                'uraian' => 'Sisa kegiatan PMO',
                'bidang' => 'PSDM',
                'nominal' => 13500,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],
            [
                'tanggal' => '2024-06-14',
                'kategori' => 'lainnya',
                'uraian' => 'Sisa hosting dan domain',
                'bidang' => 'Kominfo',
                'nominal' => 1789,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],
            [
                'tanggal' => '2024-08-26',
                'kategori' => 'sisa_proker',
                'uraian' => 'Sisa kegiatan KEBATIK 2024',
                'bidang' => 'PSDM',
                'nominal' => 507985,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],
            [
                'tanggal' => '2024-09-08',
                'kategori' => 'sisa_proker',
                'uraian' => 'Sisa ITGS',
                'bidang' => 'Humas',
                'nominal' => 137000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',   
            ],
            [
                'tanggal' => '2024-09-10',
                'kategori' => 'proposal',
                'uraian' => 'Pencairan proposal PMO',
                'bidang' => 'PSDM',
                'nominal' => 2500000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],
            [
                'tanggal' => '2024-09-19',
                'kategori' => 'sisa_proker',
                'uraian' => 'Sisa kegiatan arak-arakan wisudawan periode 107',
                'bidang' => 'PSDM',
                'nominal' => 85000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],
            [
                'tanggal' => '2024-09-20',
                'kategori' => 'lainnya',
                'uraian' => 'Peminjaman lampu sorot',
                'bidang' => 'Inti',
                'nominal' => 170000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],
            [
                'tanggal' => '2024-09-24',
                'kategori' => 'sisa_proker',
                'uraian' => 'Sisa kegiatan KAKASHI',
                'bidang' => 'Kerohanian',
                'nominal' => 139500,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],

            [
                'tanggal' => '2024-10-08',
                'kategori' => 'sisa_proker',
                'uraian' => 'Sisa kegiatan Dies Natalis ke-17',
                'bidang' => 'Inti',
                'nominal' => 162000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],

            [
                'tanggal' => '2024-10-10',
                'kategori' => 'sisa_proker',
                'uraian' => 'Sisa kegiatan IT Produktif',
                'bidang' => 'Minbak',
                'nominal' => 1000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],
            
            [
                'tanggal' => '2024-10-16',
                'kategori' => 'proposal',
                'uraian' => 'Pencairan proposal CHROME X',
                'bidang' => 'PSDM',
                'nominal' => 1500000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],

            [
                'tanggal' => '2024-11-08',
                'kategori' => 'proposal',
                'uraian' => 'Pencairan proposal kegiatan P3H',
                'bidang' => 'PSDM',
                'nominal' => 1900000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],

            [
                'tanggal' => '2024-11-13',
                'kategori' => 'sisa_proker',
                'uraian' => 'Sisa kegiatan CHROME X',
                'bidang' => 'PSDM',
                'nominal' => 538000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],

            [
                'tanggal' => '2024-11-13',
                'kategori' => 'sisa_proker',
                'uraian' => 'Sisa kegiatan P3H',
                'bidang' => 'PSDM',
                'nominal' => 47300,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],

            [
                'tanggal' => '2024-11-19',
                'kategori' => 'lainnya',
                'uraian' => 'Peminjaman infokus',
                'bidang' => 'Inti',
                'nominal' => 60000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
            ],
        
        ];

        foreach ($data as $item) {
            Pemasukan::create($item); // Memasukkan satu per satu

    }
}
}