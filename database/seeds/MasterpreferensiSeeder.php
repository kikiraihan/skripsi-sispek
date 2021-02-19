<?php

use Illuminate\Database\Seeder;
use App\Models\Masterpreferensi as Preferensi;

class MasterpreferensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        

        // $preferensi                     =new Preferensi;
        // $preferensi->id_user              =1;
        // $preferensi->catatan              ='catatan najwa';
        // $preferensi->model_type         ='App\Models\Mahasiswa';
        // $preferensi->judul              ='Contoh di Draft Skripsi Rekomendasi Beasiswa';
        // $preferensi->ordo               ='3';
        // $preferensi->matriks            ='[[1,4,6],["1\/4",1,4],["1\/6","1\/4",1]]';
        // $preferensi->matriksNormalised  =
        // '[
        //     [0.7058823529411764,0.7619047619047619,0.5454545454545454],
        //     [0.1764705882352941,0.19047619047619047,0.36363636363636365],
        //     [0.1176470588235294,0.047619047619047616,0.09090909090909091]
        // ]';
        // $preferensi->kriteria           =
        // '{
        //     "1":{"jenis":"cost","bobot":0.6710805534334945},
        //     "3":{"jenis":"benefit","bobot":0.2435277141159494},
        //     "2":{"jenis":"benefit","bobot":0.08539173245055598}
        // }';
        // $preferensi->save();




        // $preferensi                     =new Preferensi;
        // $preferensi->id_user              =1;
        // $preferensi->catatan              ='catatan seorang guru';
        // $preferensi->model_type         ='App\Models\Mahasiswa';
        // $preferensi->judul              ='Keaktifan Ekstrakulikuler';
        // $preferensi->ordo               ='3';
        // $preferensi->matriks            ='[[1,4,2],["1\/4",1,"1\/2"],["1\/2",2,1]]';
        // $preferensi->matriksNormalised  =
        // '[
        //     [0.5714285714285714,0.5714285714285714,0.5714285714285714],
        //     [0.14285714285714285,0.14285714285714285,0.14285714285714285],
        //     [0.2857142857142857,0.2857142857142857,0.2857142857142857]
        // ]';
        // $preferensi->kriteria           =
        // '{
        //     "5":{"jenis":"benefit","bobot":0.5714285714285714},
        //     "4":{"jenis":"benefit","bobot":0.14285714285714285},
        //     "3":{"jenis":"benefit","bobot":0.2857142857142857}
        // }';
        // $preferensi->save();





        




        $preferensi                     =new Preferensi;
        $preferensi->id_user            =1;
        $preferensi->catatan            ='Urutan IPK, prestasi-kegiatan';
        $preferensi->model_type         ='App\Models\Mahasiswa';
        $preferensi->judul              ='Rekomendasi Pertukaran Mahasiswa PERMATA';
        $preferensi->ordo               ='3';
        $preferensi->matriks            ='[[1,6,6],["1\/6",1,1],["1\/6",1,1]]';
        $preferensi->matriksNormalised  =
        '[
            [0.7499999999999999,0.75,0.75],
            [0.12499999999999999,0.125,0.125],
            [0.12499999999999999,0.125,0.125]
        ]';
        $preferensi->kriteria           =
        '{
            "2":{"jenis":"benefit","bobot":0.75},
            "5":{"jenis":"benefit","bobot":0.125},
            "3":{"jenis":"benefit","bobot":0.125}
        }';
        $preferensi->save();





        $preferensi                     =new Preferensi;
        $preferensi->id_user            =1;
        $preferensi->catatan            ='Urutan IPK, Prestasi, Kegiatan, Ormawa, Penghasilan ';
        $preferensi->model_type         ='App\Models\Mahasiswa';
        $preferensi->judul              ='Rekomendasi Beasiswa BI';
        $preferensi->ordo               ='5';
        $preferensi->matriks            ='[[1,"1\/2",2,4,5],[2,1,3,3,6],["1\/2","1\/3",1,1,2],["1\/4","1\/3",1,1,2],["1\/5","1\/6","1\/2","1\/2",1]]';
        $preferensi->matriksNormalised  =
        '[
            [0.2531645569620253,0.2142857142857143,0.26666666666666666,0.42105263157894735,0.3125],
            [0.5063291139240506,0.4285714285714286,0.4,0.3157894736842105,0.375],
            [0.12658227848101264,0.14285714285714288,0.13333333333333333,0.10526315789473684,0.125],
            [0.06329113924050632,0.14285714285714288,0.13333333333333333,0.10526315789473684,0.125],
            [0.05063291139240506,0.07142857142857144,0.06666666666666667,0.05263157894736842,0.0625]
        ]';
        $preferensi->kriteria           =
        '{
            "5":{"jenis":"benefit","bobot":0.29353391389867073},
            "2":{"jenis":"benefit","bobot":0.4051380032359379},
            "3":{"jenis":"benefit","bobot":0.12660718251324515},
            "4":{"jenis":"benefit","bobot":0.11394895466514388},
            "6":{"jenis":"cost","bobot":0.06077194568700232}
        }';
        $preferensi->save();





        // $preferensi                     =new Preferensi;
        // $preferensi->id_user            =1;
        // $preferensi->catatan            ='Urutan IPK, Kegiatan, Nilai SIG';
        // $preferensi->model_type         ='App\Models\Mahasiswa';
        // $preferensi->judul              ='KKN Hilirasi Sungai';
        // $preferensi->ordo               ='3';
        // $preferensi->matriks            ='[[1,"1\/3","1\/2"],[3,1,1],[2,1,1]]';
        // $preferensi->matriksNormalised  =
        // '[
        //     [0.16666666666666666,0.14285714285714288,0.2],
        //     [0.5,0.4285714285714286,0.4],
        //     [0.3333333333333333,0.4285714285714286,0.4]
        // ]';
        // $preferensi->kriteria           =
        // '{
        //     "61":{"jenis":"benefit","bobot":0.16984126984126982},
        //     "2":{"jenis":"benefit","bobot":0.4428571428571429},
        //     "3":{"jenis":"benefit","bobot":0.38730158730158726}
        // }';
        // $preferensi->save();


        // $preferensi                     =new Preferensi;
        // $preferensi->id_user            =1;
        // $preferensi->catatan            ='urutan nilai web, ipk, Kegiatan, Prestasi';
        // $preferensi->model_type         ='App\Models\Mahasiswa';
        // $preferensi->judul              ='Rekomendasi mengutus lomba web';
        // $preferensi->ordo               ='4';
        // $preferensi->matriks            ='[[1,6,8,8],["1\/6",1,5,4],["1\/8","1\/5",1,"1\/2"],["1\/8","1\/4",2,1]]';
        // $preferensi->matriksNormalised  =
        // '[
        //     [0.7058823529411764,0.8053691275167785,0.5,0.5925925925925926],
        //     [0.1176470588235294,0.1342281879194631,0.3125,0.2962962962962963],
        //     [0.08823529411764705,0.026845637583892617,0.0625,0.037037037037037035],
        //     [0.08823529411764705,0.03355704697986577,0.125,0.07407407407407407]
        // ]';
        // $preferensi->kriteria           =
        // '{
        //     "43":{"jenis":"benefit","bobot":0.6509610182626369},
        //     "2":{"jenis":"benefit","bobot":0.2151678857598222},
        //     "5":{"jenis":"benefit","bobot":0.05365449218464417},
        //     "3":{"jenis":"benefit","bobot":0.08021660379289672}
        // }';
        // $preferensi->save();






    }
}
