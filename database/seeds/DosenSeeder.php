<?php

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Dosen;
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
        $user = new User;
        $user->username                 = '1234';
        $user->email                    = 'dosen@gmail.com';
        $user->email_verified_at        = now();
        $user->password                 = Hash::make('1234');
        $dosen                          = new Dosen;
        $dosen->nama                    ="Fulan bin fulan";
        $dosen->nip                     ="1234";


        $user->save();
        $user->dosen()->save($dosen);

        //deklarasi role
        $user->assignRole('Dosen');


        $mahasiswa=Mahasiswa::find(1);
        $dosen->mahasiswapa()->save($mahasiswa);

        $this->command->info('Berhasil Menambahkan 1 Dosen');
    }
}
