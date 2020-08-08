<?php

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\User;
// use Faker\Generator as Faker;
use Illuminate\Support\Str;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Faker $faker
        $faker = Faker\Factory::create();


        for ($i=1; $i <=7 ; $i++) {
            $user = new User;
            $user->username                 ='mahasiswa'.$i;
            $user->email                    = $user->username.'@gmail.com';
            $user->email_verified_at        = now();
            $user->password                 = 'password';
            $mahasiswa                      = new Mahasiswa;
            $mahasiswa->nama                = $faker->name;
            $mahasiswa->nim                 = $faker->randomNumber;
            $mahasiswa->angkatan            ='20'.$faker->numberBetween($min = 10, $max = 20);
            $mahasiswa->prodi               =$faker->randomElement(['S1 - Sistem Informasi','S1 - Pendidikan Teknologi Informasi']);
            $mahasiswa->tgl_lahir           ='2020-04-04 00:11:51';
            $mahasiswa->jenis_kelamin       =$faker->randomElement(['Laki-Laki','Perempuan']);
            $mahasiswa->golongan_darah      =$faker->randomElement(['O','A','AB','B']);
            $mahasiswa->agama               =$faker->randomElement(['Islam','Kristen','Katolik','Budha','Hindu','Konghuchu','Lainnya']);
            $mahasiswa->status_menikah      =$faker->numberBetween($min = 0, $max = 1);
            $mahasiswa->asuransi            =$faker->randomElement(['-','JAMKESMAS','JAMKESMAN','JAMKESDA','BPJS','JAMKESTA','Kelurga Sejahtera (KKS)','Program Keluarga Harapan (PKH)',]);
            $mahasiswa->no_ktp              =$faker->isbn13;
            $mahasiswa->no_hp               =$faker->e164PhoneNumber;
            $mahasiswa->ipk_sebelumnya      =$faker->randomFloat(2, 1, 4);
            $user->save();
            $user->mahasiswa()->save($mahasiswa);

            //deklarasi role
            $user->assignRole('Mahasiswa');
        }

        $this->command->info('Berhasil Menambahkan Mahasiswa');





    }
}
