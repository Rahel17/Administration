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
        $data = [
            [
                'tanggal' => '2024-01-15',
                'kategori' => 'proker',
                'uraian' => 'Cetak foto mantan ketua Himatif',
                'bidang' => 'Inti',
                'nominal' => 30000,
                'penanggungjawab' => 'Putri Kartika (Informatika 20)',
                
            ],

            [
                'tanggal' => '2024-01-31',
                'kategori' => 'lainnya',
                'uraian' => 'Pembelian baygon dan superpel',
                'bidang' => 'Inti',
                'nominal' => 180000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
                
            ],

            [
                'tanggal' => '2024-02-01',
                'kategori' => 'lainnya',
                'uraian' => 'Agenda rapat kerja (raker)',
                'bidang' => 'Inti',
                'nominal' => 270000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
                
            ],

            [
                'tanggal' => '2024-02-12',
                'kategori' => 'proker',
                'uraian' => 'Pendanaan CHROME IX',
                'bidang' => 'PSDM',
                'nominal' => 250000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
                
            ],

            [
                'tanggal' => '2024-03-05',
                'kategori' => 'lainnya',
                'uraian' => 'Modal kewirausahaan',
                'bidang' => 'Danus',
                'nominal' => 150000,
                'penanggungjawab' => 'Raden Charissa (Informatika 22)',
               
            ],

            [
                'tanggal' => '2024-03-05',
                'kategori' => 'proker',
                'uraian' => 'Selebrasi wisudawan periode 105',
                'bidang' => 'PSDM',
                'nominal' => 150000,
                'penanggungjawab' => 'Saniyyah (Informatika 22)',
                
            ],

            [
                'tanggal' => '2024-03-18',
                'kategori' => 'proker',
                'uraian' => 'Domain Himatif',
                'bidang' => 'Kominfo',
                'nominal' => 194000,
                'penanggungjawab' => 'Alif Nurhidayat (Informatika 22)',
                
            ],

            [
                'tanggal' => '2024-03-31',
                'kategori' => 'proker',
                'uraian' => 'Kegiatan SABDA',
                'bidang' => 'Kerohanian',
                'nominal' => 200000,
                'penanggungjawab' => 'Rofiq (Informatika 22)',
                
            ],

            [
                'tanggal' => '2024-04-30',
                'kategori' => 'proker',
                'uraian' => 'KEBATIK 2024',
                'bidang' => 'PSDM',
                'nominal' => 500000,
                'penanggungjawab' => 'Zahra (Informatika 22)',
                
            ],

            [
                'tanggal' => '2024-05-21',
                'kategori' => 'proker',
                'uraian' => 'Hosting',
                'bidang' => 'PSDM',
                'nominal' => 220000,
                'penanggungjawab' => 'Damianus (Informatika 22)',
                
            ],

            [
                'tanggal' => '2024-05-31',
                'kategori' => 'proker',
                'uraian' => 'Kegiatan PMO',
                'bidang' => 'PSDM',
                'nominal' => 300000,
                'penanggungjawab' => 'Saniyyah (Informatika 22)',
                
            ],

            [
                'tanggal' => '2024-06-12',
                'kategori' => 'proker',
                'uraian' => 'Kegiatan arak-arakan periode 106',
                'bidang' => 'PSDM',
                'nominal' => 110000,
                'penanggungjawab' => 'Saniyyah (Informatika 22)',
                
            ],  

            [
                'tanggal' => '2025-06-12',
                'kategori' => 'lainnya',
                'uraian' => 'Perbaikan kamera',
                'bidang' => 'Kominfo',
                'nominal' => 300000,
                'penanggungjawab' => 'Ulfa (Informatika 22)',
                
            ],
            
            [
                'tanggal' => '2025-08-11',
                'kategori' => 'lainnya',
                'uraian' => 'Agenda Musywarah Istimewa',
                'bidang' => 'Inti',
                'nominal' => 85000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
                
            ],

            [
                'tanggal' => '2025-08-18',
                'kategori' => 'lainnya',
                'uraian' => 'Stampel pad',
                'bidang' => 'Inti',
                'nominal' => 18000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
                
            ],

            [
                'tanggal' => '2025-08-20',
                'kategori' => 'lainnya',
                'uraian' => 'Pembelian stiker papan tulis tempel',
                'bidang' => 'Inti',
                'nominal' => 20500,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
                
            ],

            [
                'tanggal' => '2025-08-26',
                'kategori' => 'proker',
                'uraian' => 'Kegiatan IT Goes To School',
                'bidang' => 'Humas',
                'nominal' => 300000,
                'penanggungjawab' => 'Aisyah (Informatika 22)',
                
            ],

            [
                'tanggal' => '2025-09-02',
                'kategori' => 'proker',
                'uraian' => 'Kajian HIMATIF',
                'bidang' => 'Kerohanian',
                'nominal' => 500000,
                'penanggungjawab' => 'Rofiq (Informatika 22)',
                
            ],

            [
                'tanggal' => '2025-09-08',
                'kategori' => 'lainnya',
                'uraian' => 'Makrab Fakultas Teknik',
                'bidang' => 'Inti',
                'nominal' => 50000,
                'penanggungjawab' => 'Fiter (Informatika 22)',
                
            ],

            [
                'tanggal' => '2025-09-12',
                'kategori' => 'proker',
                'uraian' => 'Kegiatan arak-arakan periode 107',
                'bidang' => 'PSDM',
                'nominal' => 150000,
                'penanggungjawab' => 'Saniyyah (Informatika 22)',
                
            ],

            [
                'tanggal' => '2025-09-13',
                'kategori' => 'proker',
                'uraian' => 'Kegiatan CHROME X',
                'bidang' => 'PSDM',
                'nominal' => 250000,
                'penanggungjawab' => 'Nadya (Informatika 23)',
                
            ],

            [
                'tanggal' => '2025-09-23',
                'kategori' => 'proker',
                'uraian' => 'Kegiatan Dies Natalis Himatif ke-17',
                'bidang' => 'Inti',
                'nominal' => 1250000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
                
            ],

            [
                'tanggal' => '2025-10-05',
                'kategori' => 'proker',
                'uraian' => 'Kegiatan IT Produktif',
                'bidang' => 'Minbak',
                'nominal' => 140000,
                'penanggungjawab' => 'Oki (Informatika 22)',
                
            ],

            [
                'tanggal' => '2025-10-10',
                'kategori' => 'proker',
                'uraian' => 'Kegiatan IT Produktif',
                'bidang' => 'Minbak',
                'nominal' => 140000,
                'penanggungjawab' => 'Amirah (Informatika 22)',
                
            ],

            [
                'tanggal' => '2025-10-18',
                'kategori' => 'proker',
                'uraian' => 'Kegiatan P3H',
                'bidang' => 'PSDM',
                'nominal' => 300000,
                'penanggungjawab' => 'Kenia (Informatika 23)',
                
            ],

            [
                'tanggal' => '2025-10-18',
                'kategori' => 'proker',
                'uraian' => 'Kegiatan IT Produktif',
                'bidang' => 'Minbak',
                'nominal' => 100000,
                'penanggungjawab' => 'Amirah (Informatika 22)',
                
            ],

            [
                'tanggal' => '2025-10-19',
                'kategori' => 'proker',
                'uraian' => 'Kegiatan IT Produktif',
                'bidang' => 'Minbak',
                'nominal' => 100000,
                'penanggungjawab' => 'Amirah (Informatika 22)',
                
            ],

            [
                'tanggal' => '2025-11-01',
                'kategori' => 'lainnya',
                'uraian' => 'Registrasi Perlombaan Pesta Rakyat',
                'bidang' => 'Minbak',
                'nominal' => 500000,
                'penanggungjawab' => 'Akram (Informatika 22)',
                
            ],

            [
                'tanggal' => '2025-11-08',
                'kategori' => 'lainnya',
                'uraian' => 'Print LPJ',
                'bidang' => 'Inti',
                'nominal' => 193000,
                'penanggungjawab' => 'Azilzah (Informatika 22)',
                
            ],

            [
                'tanggal' => '2025-11-15',
                'kategori' => 'lainnya',
                'uraian' => 'Kegiatan Parade Fakultas',
                'bidang' => 'Inti',
                'nominal' => 215000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
                
            ],

            [
                'tanggal' => '2025-11-15',
                'kategori' => 'proker',
                'uraian' => 'Kegiatan Himatif Holiday',
                'bidang' => 'Inti',
                'nominal' => 4000000,
                'penanggungjawab' => 'Resyaliana (Informatika 22)',
                
            ],

            [
                'tanggal' => '2025-11-20',
                'kategori' => 'lainnya',
                'uraian' => 'Sewa studio band',
                'bidang' => 'Minbak',
                'nominal' => 120000,
                'penanggungjawab' => 'Evelyn (Informatika 22)',
                
            ],

        ];

        foreach ($data as $item) {
            Pengeluaran::create($item); // Memasukkan satu per satu
        }
    }
}
