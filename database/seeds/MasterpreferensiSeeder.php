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
        // $preferensi->model_type         ='App\Models\Mahasiswa';
        // $preferensi->judul              ='Rekomendasi Lomba Pemrograman';
        // $preferensi->ordo               ='';
        // $preferensi->matriks            ='';
        // $preferensi->matriksNormalised  ='';
        // $preferensi->kriteria           ='';
        // $preferensi->save();

        $preferensi                     =new Preferensi;
        $preferensi->id_user              =1;
        $preferensi->catatan              ='catatan najwa';
        $preferensi->model_type         ='App\Models\Mahasiswa';
        $preferensi->judul              ='Rekomendasi Beasiswa';
        $preferensi->ordo               ='3';
        $preferensi->matriks            ='[[1,4,6],["1\/4",1,4],["1\/6","1\/4",1]]';
        $preferensi->matriksNormalised  =
        '[
            [0.7058823529411764,0.7619047619047619,0.5454545454545454],
            [0.1764705882352941,0.19047619047619047,0.36363636363636365],
            [0.1176470588235294,0.047619047619047616,0.09090909090909091]
        ]';
        $preferensi->kriteria           =
        '{
            "1":{"jenis":"cost","bobot":0.6710805534334945},
            "3":{"jenis":"benefit","bobot":0.2435277141159494},
            "2":{"jenis":"benefit","bobot":0.08539173245055598}
        }';
        $preferensi->save();




        $preferensi                     =new Preferensi;
        $preferensi->id_user              =1;
        $preferensi->catatan              ='catatan seorang guru';
        $preferensi->model_type         ='App\Models\Mahasiswa';
        $preferensi->judul              ='Keaktifan Ekstrakulikuler';
        $preferensi->ordo               ='3';
        $preferensi->matriks            ='[[1,4,2],["1\/4",1,"1\/2"],["1\/2",2,1]]';
        $preferensi->matriksNormalised  =
        '[
            [0.5714285714285714,0.5714285714285714,0.5714285714285714],
            [0.14285714285714285,0.14285714285714285,0.14285714285714285],
            [0.2857142857142857,0.2857142857142857,0.2857142857142857]
        ]';
        $preferensi->kriteria           =
        '{
            "5":{"jenis":"benefit","bobot":0.5714285714285714},
            "4":{"jenis":"benefit","bobot":0.14285714285714285},
            "3":{"jenis":"benefit","bobot":0.2857142857142857}
        }';
        $preferensi->save();

    }
}
