<?php

use Illuminate\Database\Seeder;
use App\Models\Masterkriteria;

class MasterkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // $master=new Masterkriteria;
        // $master->title  = "Nilai MK Coba";
        // $master->model_type  = "App\Models\Mahasiswa";
        // $master->pathTo      =
        // json_encode(
        //     [
        //         "matakuliah02"=>null,
        //         "where032"=>[
        //             "nama",
        //             "ALGORITMA DAN STRUKTUR DATA 1",
        //         ],
        //         "first02"=>null,
        //         "pivot01"=>null,
        //         "angka_mutu01"=>null,
        //     ]
        // );
        // $master->jenis       ='angka';
        // $master->rasio       =null;
        // $master->save();



        $master=new Masterkriteria;
        $master->title  = "kategori penghasilan orangtua";
        $master->model_type  = "App\Models\Mahasiswa";
        $master->pathTo      =
            json_encode(
                [
                    "orangtua02"=>null,

                    "orderBy032"=>[
                        "nominal_penghasilan",
                        "asc",
                    ],

                    "first02"=>null,
                    "kategori_penghasilan01"=>null,
                ]
            );
        $master->jenis       ='non angka';
        $master->rasio       =
        json_encode(
            [
                '< Rp. 1 juta'=>1,
                'Rp. 1 juta - 3 juta'=>2,
                'Rp. 3 juta - 5 juta'=>3,
                'Rp. 5 juta - 10 juta'=>4,
                '> Rp. 10 juta'=>5,
            ]
        );
        $master->save();




        $master=new Masterkriteria;
        $master->title       = "Indeks Prestasi Kumulatif (IPK)";
        $master->model_type  = "App\Models\Mahasiswa";
        $master->pathTo      ='{"IpkSekarang01":null}';
        $master->jenis       ='angka';
        $master->rasio       =NULL;
        $master->save();


        $master=new Masterkriteria;
        $master->title       = "Jumlah kegiatan yang pernah diikuti";
        $master->model_type  = "App\Models\Mahasiswa";
        $master->pathTo      ='{"kegiatan01":null,"count02":null}';
        $master->jenis       ='angka';
        $master->rasio       =NULL;
        $master->save();


        $master=new Masterkriteria;
        $master->title       = "Jumlah ormawa yang pernah diikuti";
        $master->model_type  = "App\Models\Mahasiswa";
        $master->pathTo      ='{"organisasi01":null,"count02":null}';
        $master->jenis       ='angka';
        $master->rasio       =NULL;
        $master->save();

        $master=new Masterkriteria;
        $master->title       = "Jumlah prestasi yang pernah diraih";
        $master->model_type  = "App\Models\Mahasiswa";
        $master->pathTo      ='{"prestasi01":null,"count02":null}';
        $master->jenis       ='angka';
        $master->rasio       =NULL;
        $master->save();





        $this->command->info('Berhasil Menambahkan 2 Master Kriteria');






    }
}
