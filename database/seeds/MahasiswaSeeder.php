<?php

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Ormawa;
use App\Models\Ipksebelumnya;
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
        // $faker = Faker\Factory::create();


        // for ($i=1; $i <=7 ; $i++) {
        //     $user = new User;
        //     $user->username                 ='mahasiswa'.$i;
        //     $user->email                    = $user->username.'@gmail.com';
        //     $user->email_verified_at        = now();
        //     $user->password                 = 'password';
        //     $mahasiswa                      = new Mahasiswa;
        //     $mahasiswa->nama                = $faker->name;
        //     $mahasiswa->nim                 = $faker->randomNumber;
        //     $mahasiswa->angkatan            ='20'.$faker->numberBetween($min = 10, $max = 20);
        //     $mahasiswa->prodi               =$faker->randomElement(['S1 - Sistem Informasi','S1 - Pendidikan Teknologi Informasi']);
        //     $mahasiswa->tgl_lahir           ='2020-04-04 00:11:51';
        //     $mahasiswa->jenis_kelamin       =$faker->randomElement(['Laki-Laki','Perempuan']);
        //     $mahasiswa->golongan_darah      =$faker->randomElement(['O','A','AB','B']);
        //     $mahasiswa->agama               =$faker->randomElement(['Islam','Kristen','Katolik','Budha','Hindu','Konghuchu','Lainnya']);
        //     $mahasiswa->status_menikah      =$faker->numberBetween($min = 0, $max = 1);
        //     $mahasiswa->asuransi            =$faker->randomElement(['-','JAMKESMAS','JAMKESMAN','JAMKESDA','BPJS','JAMKESTA','Kelurga Sejahtera (KKS)','Program Keluarga Harapan (PKH)',]);
        //     $mahasiswa->no_ktp              =$faker->isbn13;
        //     $mahasiswa->no_hp               =$faker->e164PhoneNumber;
        //     $mahasiswa->ipk_sebelumnya      =$faker->randomFloat(2, 1, 4);
        //     $user->save();
        //     $user->mahasiswa()->save($mahasiswa);

        //     //deklarasi role
        //     $user->assignRole('Mahasiswa');
        // }

        // $this->command->info('Berhasil Menambahkan Mahasiswa');








        // ALEX
        $user = new User;
        $user->username                 ='531000001';
        $user->email                    = 'alex@gmail.com';
        $user->email_verified_at        = now();
        $user->password                 = '531000001';
        $mahasiswa                      = new Mahasiswa;
        $mahasiswa->nama                ="ALEX";
        $mahasiswa->nim                 ="531000001";
        $mahasiswa->angkatan            ="2016";
        $mahasiswa->prodi               ='S1 - Sistem Informasi';
        $mahasiswa->tempat_lahir        ='Gorontalo';
        $mahasiswa->tgl_lahir           ='1997-02-20 00:00:51';
        $mahasiswa->jenis_kelamin       ='Laki-Laki';
        $mahasiswa->golongan_darah      ='O';
        $mahasiswa->agama               ='Islam';
        $mahasiswa->status_menikah      = 0;
        $mahasiswa->asuransi            ='BPJS';
        $mahasiswa->no_ktp              ='73256173561732';
        $mahasiswa->no_hp               ='082291501083';
        $mahasiswa->id_dosen_pa         =null;
        $user->save();
        $user->mahasiswa()->save($mahasiswa);
        //deklarasi role
        $user->assignRole('Mahasiswa');
        $ipk_sebelumnya = new Ipksebelumnya;
        $ipk_sebelumnya->ipk = "3.5";
        $user->mahasiswa->ipksebelumnya()->save($ipk_sebelumnya);
        // ormawa
        $mahasiswa->organisasi()->attach(1, [
            'periode_dari' => '2016',
            'periode_sampai' => '2018',
            'suratbuktianggota' => '',
            'status'=>'valid',//'pending','valid','ditolak',
        ]);
        // ortu
        $ayah=new App\Models\Orangtua;
        $ayah->nama="Alex pe ayah";
        $ayah->pekerjaan='1. PNS (bukan Guru / Dosen)';
        $ayah->kategori_pekerjaan='1';
        $ayah->no_hp='081340416221';
        $ayah->pendidikan_terakhir='SD';
        $ayah->kategori_penghasilan='< Rp. 1 juta';
        $ayah->nominal_penghasilan=500000;
        $ayah->hubungan="ayah";
        $mahasiswa->orangtua()->save($ayah);
        // prestasi
        for ($i=1; $i <= 4; $i++) 
        { 
            $prestasi=new App\Models\Prestasi;
            $prestasi->sertifikat="ada";
            $prestasi->judul="prestasi ".$i;
            $prestasi->tanggal='2019-11-20 00:00:51';
            $prestasi->tingkat='Nasional';
            $prestasi->peringkat=3;
            $prestasi->lokasi='Salatiga';
            $prestasi->kategori='Web Programming';
            $prestasi->status='valid';
            $mahasiswa->prestasi()->save($prestasi);
        }
        // kegiatan
        for ($i=1; $i <=12 ; $i++) 
        { 
            $kegiatan=new App\Models\Kegiatan;
            $kegiatan->sertifikat="ada";
            $kegiatan->judul="kegiatan ".$i;
            $kegiatan->tanggal='2018-12-02 00:00:51';
            $kegiatan->lokasi="Auditorium UNG";
            $kegiatan->penyelenggara="penyelenggara ".$i;
            $kegiatan->status="valid";
            $mahasiswa->kegiatan()->save($kegiatan);
        }
        $this->command->info('Berhasil Menambahkan Alex contoh');


        // Budi
        $user = new User;
        $user->username                 ='531000002';
        $user->email                    = 'budi@gmail.com';
        $user->email_verified_at        = now();
        $user->password                 = '531000002';
        $mahasiswa                      = new Mahasiswa;
        $mahasiswa->nama                ="Budi";
        $mahasiswa->nim                 ="531000002";
        $mahasiswa->angkatan            ="2016";
        $mahasiswa->prodi               ='S1 - Sistem Informasi';
        $mahasiswa->tempat_lahir        ='Gorontalo';
        $mahasiswa->tgl_lahir           ='1997-02-20 00:00:51';
        $mahasiswa->jenis_kelamin       ='Laki-Laki';
        $mahasiswa->golongan_darah      ='O';
        $mahasiswa->agama               ='Islam';
        $mahasiswa->status_menikah      = 0;
        $mahasiswa->asuransi            ='BPJS';
        $mahasiswa->no_ktp              ='73256173561712';
        $mahasiswa->no_hp               ='082291501022';
        $mahasiswa->id_dosen_pa         =null;
        $user->save();
        $user->mahasiswa()->save($mahasiswa);
        //deklarasi role
        $user->assignRole('Mahasiswa');
        $ipk_sebelumnya = new Ipksebelumnya;
        $ipk_sebelumnya->ipk = "3.8";
        $user->mahasiswa->ipksebelumnya()->save($ipk_sebelumnya);
        // ormawa
        for ($i=1; $i <=3 ; $i++) { 
            $mahasiswa->organisasi()->attach($i, [
                'periode_dari' => '2016',
                'periode_sampai' => '2018',
                'suratbuktianggota' => '',
                'status'=>'valid',//'pending','valid','ditolak',
            ]);
        }
        // ortu
        $ayah=new App\Models\Orangtua;
        $ayah->nama="Budi pe ayah";
        $ayah->pekerjaan='2. PNS (Guru / Dosen)';
        $ayah->kategori_pekerjaan='4';
        $ayah->no_hp='081340416262';
        $ayah->pendidikan_terakhir='S2';
        $ayah->kategori_penghasilan='Rp. 3 juta - 5 juta';
        $ayah->nominal_penghasilan=5000000;
        $ayah->hubungan="ayah";
        $mahasiswa->orangtua()->save($ayah);
        // prestasi
        for ($i=1; $i <= 3; $i++) 
        { 
            $prestasi=new App\Models\Prestasi;
            $prestasi->sertifikat="ada";
            $prestasi->judul="prestasi ".$i;
            $prestasi->tanggal='2019-11-20 00:00:51';
            $prestasi->tingkat='Nasional';
            $prestasi->peringkat=3;
            $prestasi->lokasi='Salatiga';
            $prestasi->kategori='Web Programming';
            $prestasi->status='valid';
            $mahasiswa->prestasi()->save($prestasi);
        }
        // kegiatan
        for ($i=1; $i <=14 ; $i++) 
        { 
            $kegiatan=new App\Models\Kegiatan;
            $kegiatan->sertifikat="ada";
            $kegiatan->judul="kegiatan ".$i;
            $kegiatan->tanggal='2018-12-02 00:00:51';
            $kegiatan->lokasi="Auditorium UNG";
            $kegiatan->penyelenggara="penyelenggara ".$i;
            $kegiatan->status="valid";
            $mahasiswa->kegiatan()->save($kegiatan);
        }
        $this->command->info('Berhasil Menambahkan Budi contoh');



        // Cho Min Suk
        $user = new User;
        $user->username                 ='531000003';
        $user->email                    = 'chominsuk@gmail.com';
        $user->email_verified_at        = now();
        $user->password                 = '531000003';
        $mahasiswa                      = new Mahasiswa;
        $mahasiswa->nama                ="Cho Min Suk";
        $mahasiswa->nim                 ="531000003";
        $mahasiswa->angkatan            ="2016";
        $mahasiswa->prodi               ='S1 - Sistem Informasi';
        $mahasiswa->tempat_lahir        ='Gorontalo';
        $mahasiswa->tgl_lahir           ='1997-02-20 00:00:51';
        $mahasiswa->jenis_kelamin       ='Laki-Laki';
        $mahasiswa->golongan_darah      ='O';
        $mahasiswa->agama               ='Islam';
        $mahasiswa->status_menikah      = 0;
        $mahasiswa->asuransi            ='BPJS';
        $mahasiswa->no_ktp              ='73256173561713';
        $mahasiswa->no_hp               ='082291501023';
        $mahasiswa->id_dosen_pa         =null;
        $user->save();
        $user->mahasiswa()->save($mahasiswa);
        //deklarasi role
        $user->assignRole('Mahasiswa');
        $ipk_sebelumnya = new Ipksebelumnya;
        $ipk_sebelumnya->ipk = "3.9";
        $user->mahasiswa->ipksebelumnya()->save($ipk_sebelumnya);
        // ormawa
        for ($i=1; $i <=1 ; $i++) { 
            $mahasiswa->organisasi()->attach($i, [
                'periode_dari' => '2016',
                'periode_sampai' => '2018',
                'suratbuktianggota' => '',
                'status'=>'valid',//'pending','valid','ditolak',
            ]);
        }
        // ortu
        $ayah=new App\Models\Orangtua;
        $ayah->nama="Cho Min Suk pe ayah";
        $ayah->pekerjaan='2. PNS (Guru / Dosen)';
        $ayah->kategori_pekerjaan='4';
        $ayah->no_hp='081340416262';
        $ayah->pendidikan_terakhir='S2';
        $ayah->kategori_penghasilan='Rp. 3 juta - 5 juta';
        $ayah->nominal_penghasilan=5000000;
        $ayah->hubungan="ayah";
        $mahasiswa->orangtua()->save($ayah);
        // prestasi
        for ($i=1; $i <= 2; $i++) 
        { 
            $prestasi=new App\Models\Prestasi;
            $prestasi->sertifikat="ada";
            $prestasi->judul="prestasi ".$i;
            $prestasi->tanggal='2019-11-20 00:00:51';
            $prestasi->tingkat='Nasional';
            $prestasi->peringkat=3;
            $prestasi->lokasi='Salatiga';
            $prestasi->kategori='Web Programming';
            $prestasi->status='valid';
            $mahasiswa->prestasi()->save($prestasi);
        }
        // kegiatan
        for ($i=1; $i <=2 ; $i++) 
        { 
            $kegiatan=new App\Models\Kegiatan;
            $kegiatan->sertifikat="ada";
            $kegiatan->judul="kegiatan ".$i;
            $kegiatan->tanggal='2018-12-02 00:00:51';
            $kegiatan->lokasi="Auditorium UNG";
            $kegiatan->penyelenggara="penyelenggara ".$i;
            $kegiatan->status="valid";
            $mahasiswa->kegiatan()->save($kegiatan);
        }
        $this->command->info('Berhasil Menambahkan Cho Min Suk contoh');



        // Donita
        $user = new User;
        $user->username                 ='531000004';
        $user->email                    = 'donita@gmail.com';
        $user->email_verified_at        = now();
        $user->password                 = '531000004';
        $mahasiswa                      = new Mahasiswa;
        $mahasiswa->nama                ="Donita";
        $mahasiswa->nim                 ="531000004";
        $mahasiswa->angkatan            ="2016";
        $mahasiswa->prodi               ='S1 - Sistem Informasi';
        $mahasiswa->tempat_lahir        ='Gorontalo';
        $mahasiswa->tgl_lahir           ='1997-02-20 00:00:51';
        $mahasiswa->jenis_kelamin       ='Perempuan';
        $mahasiswa->golongan_darah      ='O';
        $mahasiswa->agama               ='Islam';
        $mahasiswa->status_menikah      = 0;
        $mahasiswa->asuransi            ='BPJS';
        $mahasiswa->no_ktp              ='73256173561714';
        $mahasiswa->no_hp               ='082291501024';
        $mahasiswa->id_dosen_pa         =null;
        $user->save();
        $user->mahasiswa()->save($mahasiswa);
        //deklarasi role
        $user->assignRole('Mahasiswa');
        $ipk_sebelumnya = new Ipksebelumnya;
        $ipk_sebelumnya->ipk = "3.5";
        $user->mahasiswa->ipksebelumnya()->save($ipk_sebelumnya);
        // ormawa
        for ($i=1; $i <=2 ; $i++) { 
            $mahasiswa->organisasi()->attach($i, [
                'periode_dari' => '2016',
                'periode_sampai' => '2018',
                'suratbuktianggota' => '',
                'status'=>'valid',//'pending','valid','ditolak',
            ]);
        }
        // ortu
        $ayah=new App\Models\Orangtua;
        $ayah->nama="Donita pe ayah";
        $ayah->pekerjaan='1. PNS (bukan Guru / Dosen)';
        $ayah->kategori_pekerjaan='1';
        $ayah->no_hp='081340416262';
        $ayah->pendidikan_terakhir='SMP';
        $ayah->kategori_penghasilan='Rp. 1 juta - 3 juta';
        $ayah->nominal_penghasilan=1000000;
        $ayah->hubungan="ayah";
        $mahasiswa->orangtua()->save($ayah);
        // prestasi
        for ($i=1; $i <= 3; $i++) 
        { 
            $prestasi=new App\Models\Prestasi;
            $prestasi->sertifikat="ada";
            $prestasi->judul="prestasi ".$i;
            $prestasi->tanggal='2019-11-20 00:00:51';
            $prestasi->tingkat='Nasional';
            $prestasi->peringkat=3;
            $prestasi->lokasi='Salatiga';
            $prestasi->kategori='Web Programming';
            $prestasi->status='valid';
            $mahasiswa->prestasi()->save($prestasi);
        }
        // kegiatan
        for ($i=1; $i <=23 ; $i++) 
        { 
            $kegiatan=new App\Models\Kegiatan;
            $kegiatan->sertifikat="ada";
            $kegiatan->judul="kegiatan ".$i;
            $kegiatan->tanggal='2018-12-02 00:00:51';
            $kegiatan->lokasi="Auditorium UNG";
            $kegiatan->penyelenggara="penyelenggara ".$i;
            $kegiatan->status="valid";
            $mahasiswa->kegiatan()->save($kegiatan);
        }
        $this->command->info('Berhasil Menambahkan Donita contoh');


    }
}
