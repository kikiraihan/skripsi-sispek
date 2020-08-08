<?php

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Kaprodi;
use App\Models\Kajur;
use App\Models\User;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $user = new User;
        $user->username                 = '123';
        $user->email                    = 'dosen@gmail.com';
        $user->email_verified_at        = now();
        $user->password                 = '123';
        $dosen                          = new Dosen;
        $dosen->nama                    ="Fulan bin fulan";
        $dosen->nip                     ="123";


        $user->save();
        $user->dosen()->save($dosen);

        //deklarasi role
        $user->assignRole('Dosen');

        $this->command->info('Berhasil Menambahkan 1 Dosen');















        $user = new User;
        $user->username                 = '1234';
        $user->email                    = 'kaprodi@gmail.com';
        $user->email_verified_at        = now();
        $user->password                 = '1234';
        $dosen                          = new Dosen;
        $dosen->nama                    ="Ini Kaprodi";
        $dosen->nip                     ="1234";
        $kaprodi                        = new Kaprodi;
        $kaprodi->prodi                 ='S1 - Pendidikan Teknologi Informasi';// ['S1 - Sistem Informasi','S1 - Pendidikan Teknologi Informasi'];
        $kaprodi->periode               ="2019-2024";


        $user->save();
        $user->dosen()->save($dosen);
        $dosen->kaprodi()->save($kaprodi);

        //deklarasi role
        $user->assignRole('Dosen');
        $user->assignRole('Kaprodi');

        $this->command->info('Berhasil Menambahkan 1 Kaprodi');















        $user = new User;
        $user->username                 = '12345';
        $user->email                    = 'kajur@gmail.com';
        $user->email_verified_at        = now();
        $user->password                 = '12345';
        $dosen                          = new Dosen;
        $dosen->nama                    ="Ini Kajur";
        $dosen->nip                     ="12345";
        $kajur                          = new Kajur;
        $kajur->jurusan                   ='Teknik Informatika';// ['S1 - Sistem Informasi','S1 - Pendidikan Teknologi Informasi'];
        $kajur->periode                 ="2019-2024";


        $user->save();
        $user->dosen()->save($dosen);
        $dosen->kajur()->save($kajur);



        $user->save();
        $user->dosen()->save($dosen);

        //deklarasi role
        $user->assignRole('Dosen');
        $user->assignRole('Kajur');


        $mahasiswa=Mahasiswa::find(1);
        $dosen->mahasiswapa()->save($mahasiswa);

        $this->command->info('Berhasil Menambahkan 1 Kajur');







    }
}
