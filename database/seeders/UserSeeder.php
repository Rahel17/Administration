<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [

            //admin
            //1
            [
                'name' => 'Rana Qonitah Helida',
                'npm' => 'G1A022017',
                'role' => 'admin',
                'password' => '121212',
            ],

            //bendum
            //2
            [
                'name' => 'Resyaliana Esa Putri',
                'npm' => 'G1A022038',
                'role' => 'bendum',
                'password' => '121212',
            ],

            //anggota (inti)
            //3
            [
                'name' => 'Fiter Ramadansyah',
                'npm' => 'G1A022053',
            ],

            //4
            [
                'name' => 'Khairul Afif',
                'npm' => 'G1A022066',
            ],


            //5
            [
                'name' => 'Azilzah Nur Zanafa',
                'npm' => 'G1A022003',
            ],
            

            //6
            [
                'name' => 'Diodo Arrahman',
                'npm' => 'G1A022027',
            ],


            //anggota (PSDM)
            //7
            [
                'name' => 'Ferdy Fitriansyah Rowi',
                'npm' => 'G1A022082',
            ],

            //8
            [
                'name' => 'Anissa Shanniyah Aprilia',
                'npm' => 'G1A022044',
            ],

            //9
            [
                'name' => 'Reyvano Arya Pulunggono',
                'npm' => 'G1A022094',
            ],

            //10
            [
                'name' => 'Dian Ardiyanti Saputri',
                'npm' => 'G1A022084',
            ],

            //11
            [
                'name' => 'Shalaudin Muhammad Sah',
                'npm' => 'G1A022070',
            ],

            //12
            [
                'name' => 'Attiya Dianti Fadli',
                'npm' => 'G1A022002',
            ],

            //13
            [
                'name' => 'Saniyyah Zhafirah',
                'npm' => 'G1A022081',
            ],

            //14
            [
                'name' => 'Revo Pratama',
                'npm' => 'G1A022058',
            ],

            //15
            [
                'name' => 'Ari Setiawan',
                'npm' => 'G1A022092',
            ],

            //16
            [
                'name' => 'Kenia Nurma Feblia',
                'npm' => 'G1A023004',
            ],      

            //17
            [
                'name' => 'Diosi Putri Arlita',
                'npm' => 'G1A023012',
            ],

            //18
            [
                'name' => 'Ammar Siraj Ananda',
                'npm' => 'G1A023021',
            ],

            //19
            [
                'name' => 'Muhammad Hafizh Ario Diffo',
                'npm' => 'G1A023032',
            ],

            //20
            [
                'name' => 'Ghazi Al-Ghifari',
                'npm' => 'G1A023553',
            ],

            //21
            [
                'name' => 'Yovanza Villareal',
                'npm' => 'G1A023054',
            ],

            //22
            [
                'name' => 'Muhammad Dizi Valgiyos. A',
                'npm' => 'G1A023072',
            ],

            //kerohanian
            //23
            [
                'name' => 'Delvi Nur Rofiq Sitepu',
                'npm' => 'G1A022005',
            ],

            //24
            [
                'name' => 'Tiesya Andriani Ramadhanti',
                'npm' => 'G1A022014',
            ],

            //25
            [
                'name' => 'Rafi Afrian Al Haritz',
                'npm' => 'G1A022033',
            ],

            //26
            [
                'name' => 'M. Febri Ardiansyah',
                'npm' => 'G1A022049',
            ],

            //27
            [
                'name' => 'Julia Mayang Sari',
                'npm' => 'G1A022010',
            ],

            //28
            [
                'name' => 'Atika Oktavianti',
                'npm' => 'G1A022020',
            ],

            //29
            [
                'name' => 'Imelda Cyntia',
                'npm' => 'G1A022022',
            ],

            //30
            [
                'name' => 'Davi Sulaiman',
                'npm' => 'G1A022001',
            ],  

            //31
            [
                'name' => 'Ayu Anggraini',
                'npm' => 'G1A022007',
            ],

            //32
            [
                'name' => 'Muhammad Aimar Apda. H',
                'npm' => 'G1A023048',
            ],

            //33
            [
                'name' => 'Fathiyya Nafisah',
                'npm' => 'G1A023047',
            ],

            //34
            [
                'name' => 'Muhammad Ripal Rabbani',
                'npm' => 'G1A023064',
            ],      

            //35
            [
                'name' => 'Akhmat Qavidhufahmi',
                'npm' => 'G1A023070',
            ],


            //(Humas)
            //36
            [
                'name' => 'Revan Averus Mufid',
                'npm' => 'G1A022065',
            ],

            //37
            [
                'name' => 'Aisyah Amelia Zarah Juaita',
                'npm' => 'G1A022075',
            ],

            //38
            [
                'name' => 'Federika ButarButar',
                'npm' => 'G1A022030',
            ],  

            //39
            [
                'name' => 'Merly Yuni Purnama',
                'npm' => 'G1A022006',
            ],

            //40
            [
                'name' => 'Anugrah Herianto',
                'npm' => 'G1A022068',
            ],

            //41
            [
                'name' => 'Neli Agustin',
                'npm' => 'G1A022048',
            ],

            //42
            [
                'name' => 'Weko Abror',
                'npm' => 'G1A022025',
            ],

            //43
            [
                'name' => 'Ade Irawan',
                'npm' => 'G1A022083',
            ],

            //44
            [
                'name' => 'Linia Nur Aini',
                'npm' => 'G1A023007',
            ],

            //45
            [
                'name' => 'Aditya Saputra',
                'npm' => 'G1A023024',
            ],  

            //46
            [
                'name' => 'Ayu Dewanti Suci',
                'npm' => 'G1A023057',
            ],

            //47
            [
                'name' => 'Qonita Adzkiatul Mardiyah',
                'npm' => 'G1A023086',
            ],

            //kominfo
            //48
            [
                'name' => 'Alif Nurhidayat',
                'npm' => 'G1A022073',
            ],  

            //49
            [
                'name' => 'Damianus Christopher Samosir',
                'npm' => 'G1A022028',
            ],

            //50
            [
                'name' => 'Zahrah Hafizah Fakhri',
                'npm' => 'G1A022046',
            ],

            //51
            [
                'name' => 'Sinta Ezra Wati Gulo',
                'npm' => 'G1A022040',
            ],  

            //52
            [
                'name' => 'Ulfa Stevi Juliana',
                'npm' => 'G1A022042',
            ],  

            //53
            [
                'name' => 'Carli Margareta',
                'npm' => 'G1A022074',
            ],  

            //54
            [
                'name' => 'Muhammad Rozagi',
                'npm' => 'G1A022008',
            ],

            //55
            [
                'name' => 'Lidya Feronica',
                'npm' => 'G1A023009',
            ],

            //56
            [
                'name' => 'Lio Kusnata',
                'npm' => 'G1A023013',
            ],

            //57
            [
                'name' => 'Reyhan Maulana Ibrahim',
                'npm' => 'G1A023046',
            ],

            //58
            [
                'name' => 'Robi Septian Subhan',
                'npm' => 'G1A023060',
            ],

            //59
            [
                'name' => 'Merischa Theresia Hutauruk',
                'npm' => 'G1A023071',
            ],

            //danus
            //60
            [
                'name' => 'Raden Charissa Prima Oktavia',
                'npm' => 'G1A022015',
            ],

            //61
            [
                'name' => 'Wahyu Ozorah Manurung',
                'npm' => 'G1A022060',
            ],

            //62
            [
                'name' => 'Lola Yashinta Dewi',
                'npm' => 'G1A022009',
            ],

            //63
            [
                'name' => 'Hikmah Hijrayanti',
                'npm' => 'G1A022026',
            ],

            //64
            [
                'name' => 'Beny Esa Pratama',
                'npm' => 'G1A022013',
            ],

            //65
            [
                'name' => 'Rizki Ramadani',
                'npm' => 'G1A022054',
            ],

            //66
            [
                'name' => 'Ahmad Radesta',
                'npm' => 'G1A022086',
            ],

            //67
            [
                'name' => 'Koreza Almukadima',
                'npm' => 'G1A023011',
            ],

            //68
            [
                'name' => 'Rheby Ersa Monica',
                'npm' => 'G1A023016',
            ],

            //69
            [
                'name' => 'Fassrah Putra Gunawan',
                'npm' => 'G1A023038',
            ],

            //70
            [
                'name' => 'Rahma Hidayati Fitrah',
                'npm' => 'G1A023074',
            ],


            //minbak
            //71
            [
                'name' => 'Akram Analis',
                'npm' => 'G1A022004',
            ],

            //72
            [
                'name' => 'M. Hisbullah Endima Tanjung',
                'npm' => 'G1A022034',
            ],

            //73
            [
                'name' => 'Evelyn Eunike Aritonang',
                'npm' => 'G1A022024',
            ],

            //74
            [
                'name' => 'Sophina Shafa Salsabila',
                'npm' => 'G1A022021',
            ],

            //75
            [
                'name' => 'Esa Nirza Zakya Putri',
                'npm' => 'G1A022036',
            ],  

            //76
            [
                'name' => 'Amirah Putri Nabila',
                'npm' => 'G1A022090',
            ],

            //77
            [
                'name' => 'Fahim Ahmad Saputra',
                'npm' => 'G1A022037',
            ],

            //78
            [
                'name' => 'Baim Mudrik Aziz',
                'npm' => 'G1A022071',
            ],

            //79
            [
                'name' => 'Keysa Maqfirah',
                'npm' => 'G1A022012',
            ],

            //80
            [
                'name' => 'Hanif Abdullah Zuhdi ',
                'npm' => 'G1A022041',
            ],

            //81
            [
                'name' => 'Oki Cahaya Putra',
                'npm' => 'G1A022095',
            ],

            //82
            [
                'name' => 'Bavio Robia Rahmadan',
                'npm' => 'G1A023002',
            ],

            //83
            [
                'name' => 'Hesi Desta Lestari',
                'npm' => 'G1A023006',
            ],  

            //84
            [
                'name' => 'Nadya Alicia Putri',
                'npm' => 'G1A023019',
            ],

            //85
            [
                'name' => 'Primanda Nafissa Alfiansyah',
                'npm' => 'G1A023044',
            ],

            //86
            [
                'name' => 'Dinda Krisnauli Pakpahan',
                'npm' => 'G1A023076',
            ],
        ];
        foreach ($users as $user) {
            User::factory()->create($user); // Factory untuk setiap data
        }
    }
}
