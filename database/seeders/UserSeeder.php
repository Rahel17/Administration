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
                'password' => '12345678',
            ],

            //4
            [
                'name' => 'Khairul Afif',
                'npm' => 'G1A022066',
                'password' => '12345678',
            ],


            //5
            [
                'name' => 'Azilzah Nur Zanafa',
                'npm' => 'G1A022003',
                'password' => '12345678',
            ],
            

            //6
            [
                'name' => 'Diodo Arrahman',
                'npm' => 'G1A022027',
                'password' => '12345678',
            ],


            //anggota (PSDM)
            //7
            [
                'name' => 'Ferdy Fitriansyah Rowi',
                'npm' => 'G1A022082',
                'password' => '12345678',
            ],

            //8
            [
                'name' => 'Anissa Shanniyah Aprilia',
                'npm' => 'G1A022044',
                'password' => '12345678',
            ],

            //9
            [
                'name' => 'Reyvano Arya Pulunggono',
                'npm' => 'G1A022094',
                'password' => '12345678',
            ],

            //10
            [
                'name' => 'Dian Ardiyanti Saputri',
                'npm' => 'G1A022084',
                'password' => '12345678',
            ],

            //11
            [
                'name' => 'Shalaudin Muhammad Sah',
                'npm' => 'G1A022070',
                'password' => '12345678',
            ],

            //12
            [
                'name' => 'Attiya Dianti Fadli',
                'npm' => 'G1A022002',
                'password' => '12345678',
            ],

            //13
            [
                'name' => 'Saniyyah Zhafirah',
                'npm' => 'G1A022081',
                'password' => '12345678',
            ],

            //14
            [
                'name' => 'Revo Pratama',
                'npm' => 'G1A022058',
                'password' => '12345678',
            ],

            //15
            [
                'name' => 'Ari Setiawan',
                'npm' => 'G1A022092',
                'password' => '12345678',
            ],

            //16
            [
                'name' => 'Kenia Nurma Feblia',
                'npm' => 'G1A023004',
                'password' => '12345678',
            ],      

            //17
            [
                'name' => 'Diosi Putri Arlita',
                'npm' => 'G1A023012',
                'password' => '12345678',
            ],

            //18
            [
                'name' => 'Ammar Siraj Ananda',
                'npm' => 'G1A023021',
                'password' => '12345678',
            ],

            //19
            [
                'name' => 'Muhammad Hafizh Ario Diffo',
                'npm' => 'G1A023032',
                'password' => '12345678',
            ],

            //20
            [
                'name' => 'Ghazi Al-Ghifari',
                'npm' => 'G1A023553',
                'password' => '12345678',
            ],

            //21
            [
                'name' => 'Yovanza Villareal',
                'npm' => 'G1A023054',
                'password' => '12345678',
            ],

            //22
            [
                'name' => 'Muhammad Dizi Valgiyos. A',
                'npm' => 'G1A023072',
                'password' => '12345678',
            ],

            //kerohanian
            //23
            [
                'name' => 'Delvi Nur Rofiq Sitepu',
                'npm' => 'G1A022005',
                'password' => '12345678',
            ],

            //24
            [
                'name' => 'Tiesya Andriani Ramadhanti',
                'npm' => 'G1A022014',
                'password' => '12345678',
            ],

            //25
            [
                'name' => 'Rafi Afrian Al Haritz',
                'npm' => 'G1A022033',
                'password' => '12345678',
            ],

            //26
            [
                'name' => 'M. Febri Ardiansyah',
                'npm' => 'G1A022049',
                'password' => '12345678',
            ],

            //27
            [
                'name' => 'Julia Mayang Sari',
                'npm' => 'G1A022010',
                'password' => '12345678',
            ],

            //28
            [
                'name' => 'Atika Oktavianti',
                'npm' => 'G1A022020',
                'password' => '12345678',
            ],

            //29
            [
                'name' => 'Imelda Cyntia',
                'npm' => 'G1A022022',
                'password' => '12345678',
            ],

            //30
            [
                'name' => 'Davi Sulaiman',
                'npm' => 'G1A022001',
                'password' => '12345678',
            ],  

            //31
            [
                'name' => 'Ayu Anggraini',
                'npm' => 'G1A022007',
                'password' => '12345678',
            ],

            //32
            [
                'name' => 'Muhammad Aimar Apda. H',
                'npm' => 'G1A023048',
                'password' => '12345678',
            ],

            //33
            [
                'name' => 'Fathiyya Nafisah',
                'npm' => 'G1A023047',
                'password' => '12345678',
            ],

            //34
            [
                'name' => 'Muhammad Ripal Rabbani',
                'npm' => 'G1A023064',
                'password' => '12345678',
            ],      

            //35
            [
                'name' => 'Akhmat Qavidhufahmi',
                'npm' => 'G1A023070',
                'password' => '12345678',
            ],


            //(Humas)
            //36
            [
                'name' => 'Revan Averus Mufid',
                'npm' => 'G1A022065',
                'password' => '12345678',
            ],

            //37
            [
                'name' => 'Aisyah Amelia Zarah Juaita',
                'npm' => 'G1A022075',
                'password' => '12345678',
            ],

            //38
            [
                'name' => 'Federika ButarButar',
                'npm' => 'G1A022030',
                'password' => '12345678',
            ],  

            //39
            [
                'name' => 'Merly Yuni Purnama',
                'npm' => 'G1A022006',
                'password' => '12345678',
            ],

            //40
            [
                'name' => 'Anugrah Herianto',
                'npm' => 'G1A022068',
                'password' => '12345678',
            ],

            //41
            [
                'name' => 'Neli Agustin',
                'npm' => 'G1A022048',
                'password' => '12345678',
            ],

            //42
            [
                'name' => 'Weko Abror',
                'npm' => 'G1A022025',
                'password' => '12345678',
            ],

            //43
            [
                'name' => 'Ade Irawan',
                'npm' => 'G1A022083',
                'password' => '12345678',
            ],

            //44
            [
                'name' => 'Linia Nur Aini',
                'npm' => 'G1A023007',
                'password' => '12345678',
            ],

            //45
            [
                'name' => 'Aditya Saputra',
                'npm' => 'G1A023024',
                'password' => '12345678',
            ],  

            //46
            [
                'name' => 'Ayu Dewanti Suci',
                'npm' => 'G1A023057',
                'password' => '12345678',
            ],

            //47
            [
                'name' => 'Qonita Adzkiatul Mardiyah',
                'npm' => 'G1A023086',
                'password' => '12345678',
            ],

            //kominfo
            //48
            [
                'name' => 'Alif Nurhidayat',
                'npm' => 'G1A022073',
                'password' => '12345678',
            ],  

            //49
            [
                'name' => 'Damianus Christopher Samosir',
                'npm' => 'G1A022028',
                'password' => '12345678',
            ],

            //50
            [
                'name' => 'Zahrah Hafizah Fakhri',
                'npm' => 'G1A022046',
                'password' => '12345678',
            ],

            //51
            [
                'name' => 'Sinta Ezra Wati Gulo',
                'npm' => 'G1A022040',
                'password' => '12345678',
            ],  

            //52
            [
                'name' => 'Ulfa Stevi Juliana',
                'npm' => 'G1A022042',
                'password' => '12345678',
            ],  

            //53
            [
                'name' => 'Carli Margareta',
                'npm' => 'G1A022074',
                'password' => '12345678',
            ],  

            //54
            [
                'name' => 'Muhammad Rozagi',
                'npm' => 'G1A022008',
                'password' => '12345678',
            ],

            //55
            [
                'name' => 'Lidya Feronica',
                'npm' => 'G1A023009',
                'password' => '12345678',
            ],

            //56
            [
                'name' => 'Lio Kusnata',
                'npm' => 'G1A023013',
                'password' => '12345678',
            ],

            //57
            [
                'name' => 'Reyhan Maulana Ibrahim',
                'npm' => 'G1A023046',
                'password' => '12345678',
            ],

            //58
            [
                'name' => 'Robi Septian Subhan',
                'npm' => 'G1A023060',
                'password' => '12345678',
            ],

            //59
            [
                'name' => 'Merischa Theresia Hutauruk',
                'npm' => 'G1A023071',
                'password' => '12345678',
            ],

            //danus
            //60
            [
                'name' => 'Raden Charissa Prima Oktavia',
                'npm' => 'G1A022015',
                'password' => '12345678',
            ],

            //61
            [
                'name' => 'Wahyu Ozorah Manurung',
                'npm' => 'G1A022060',
                'password' => '12345678',
            ],

            //62
            [
                'name' => 'Lola Yashinta Dewi',
                'npm' => 'G1A022009',
                'password' => '12345678',
            ],

            //63
            [
                'name' => 'Hikmah Hijrayanti',
                'npm' => 'G1A022026',
                'password' => '12345678',
            ],

            //64
            [
                'name' => 'Beny Esa Pratama',
                'npm' => 'G1A022013',
                'password' => '12345678',
            ],

            //65
            [
                'name' => 'Rizki Ramadani',
                'npm' => 'G1A022054',
                'password' => '12345678',
            ],

            //66
            [
                'name' => 'Ahmad Radesta',
                'npm' => 'G1A022086',
                'password' => '12345678',
            ],

            //67
            [
                'name' => 'Koreza Almukadima',
                'npm' => 'G1A023011',
                'password' => '12345678',
            ],

            //68
            [
                'name' => 'Rheby Ersa Monica',
                'npm' => 'G1A023016',
                'password' => '12345678',
            ],

            //69
            [
                'name' => 'Fassrah Putra Gunawan',
                'npm' => 'G1A023038',
                'password' => '12345678',
            ],

            //70
            [
                'name' => 'Rahma Hidayati Fitrah',
                'npm' => 'G1A023074',
                'password' => '12345678',
            ],


            //minbak
            //71
            [
                'name' => 'Akram Analis',
                'npm' => 'G1A022004',
                'password' => '12345678',
            ],

            //72
            [
                'name' => 'M. Hisbullah Endima Tanjung',
                'npm' => 'G1A022034',
                'password' => '12345678',
            ],

            //73
            [
                'name' => 'Evelyn Eunike Aritonang',
                'npm' => 'G1A022024',
                'password' => '12345678',
            ],

            //74
            [
                'name' => 'Sophina Shafa Salsabila',
                'npm' => 'G1A022021',
                'password' => '12345678',
            ],

            //75
            [
                'name' => 'Esa Nirza Zakya Putri',
                'npm' => 'G1A022036',
                'password' => '12345678',
            ],  

            //76
            [
                'name' => 'Amirah Putri Nabila',
                'npm' => 'G1A022090',
                'password' => '12345678',
            ],

            //77
            [
                'name' => 'Fahim Ahmad Saputra',
                'npm' => 'G1A022037',
                'password' => '12345678',
            ],

            //78
            [
                'name' => 'Baim Mudrik Aziz',
                'npm' => 'G1A022071',
                'password' => '12345678',
            ],

            //79
            [
                'name' => 'Keysa Maqfirah',
                'npm' => 'G1A022012',
                'password' => '12345678',
            ],

            //80
            [
                'name' => 'Hanif Abdullah Zuhdi ',
                'npm' => 'G1A022041',
                'password' => '12345678',
            ],

            //81
            [
                'name' => 'Oki Cahaya Putra',
                'npm' => 'G1A022095',
                'password' => '12345678',
            ],

            //82
            [
                'name' => 'Bavio Robia Rahmadan',
                'npm' => 'G1A023002',
                'password' => '12345678',
            ],

            //83
            [
                'name' => 'Hesi Desta Lestari',
                'npm' => 'G1A023006',
                'password' => '12345678',
            ],  

            //84
            [
                'name' => 'Nadya Alicia Putri',
                'npm' => 'G1A023019',
                'password' => '12345678',
            ],

            //85
            [
                'name' => 'Primanda Nafissa Alfiansyah',
                'npm' => 'G1A023044',
                'password' => '12345678',
            ],

            //86
            [
                'name' => 'Dinda Krisnauli Pakpahan',
                'npm' => 'G1A023076',
                'password' => '12345678',
            ],
        ];
        foreach ($users as $user) {
            User::factory()->create($user); // Factory untuk setiap data
        }
    }
}
