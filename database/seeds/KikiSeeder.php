<?php

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Ormawa;
use Illuminate\Support\Str;

class KikiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->username                 ='531416066';
        $user->email                    = 'mohzulkiflikatili@gmail.com';
        $user->email_verified_at        = now();
        $user->password                 =Hash::make('531416066');
        $mahasiswa                      = new Mahasiswa;
        $mahasiswa->nama                ="MOH. ZULKIFLI KATILI";
        $mahasiswa->nim                 ="531416066";
        $mahasiswa->angkatan            ="2016";
        $mahasiswa->prodi               ='S1 - Sistem Informasi';
        $mahasiswa->tgl_lahir           ='1997-02-20 00:00:51';
        $mahasiswa->jenis_kelamin       ='Laki-Laki';
        $mahasiswa->golongan_darah      ='O';
        $mahasiswa->agama               ='Islam';
        $mahasiswa->status_menikah      =1;
        $mahasiswa->asuransi            ='BPJS';
        $mahasiswa->no_ktp              ='73256173561731';
        $mahasiswa->no_hp               ='082291501085';
        $mahasiswa->ipk_sebelumnya      = 3.60;
        $user->save();
        $user->mahasiswa()->save($mahasiswa);

        //deklarasi role
        $user->assignRole('Mahasiswa');


        $this->command->info('Berhasil Menambahkan Mahasiswa Kiki');



        $ormawa=new Ormawa;
        $ormawa->nama='Kelompok Studi Linux - UNG';
        $ormawa->binaan='Fakultas Teknik';
        $ormawa->deskripsi="Kelompok Studi Linux Universitas Negeri Gorontalo adalah komunitas  tempat berkumpulnya warga Universitas Negeri Gorontalo yang tertarik untuk mendalami sistem operasi Linux lebih jauh. KSL UNG ini menerima anggota baik dari yang  mau belajar sampai yang mahir menggunakan linux. sow, jangan malu-malu buat yang belum mengerti sama seklai.. justru di sinilah kita akan belajar. ksl ung ini dibimbing oleh seorang dosen yang kebetulan mantan dari ksl UGM, Kelompok ini tidak meminta pungutan sekecil apapun. ayo buruan gabung!!!!";
        $ormawa->website="https://carelaig.com/kelompok-studi-linux-ksl-ung/";
        $ormawa->jenis="UKM";//'himpunan','UKM','paguyuban','luar_kampus',
        $ormawa->kategori="Teknologi";
        $ormawa->save();
        $mahasiswa->organisasi()->attach($ormawa->id, [
            'periode_dari' => '2016',
            'periode_sampai' => '2018',
            'suratbuktianggota' => '',
            'status'=>'valid',//'pending','valid','ditolak',
        ]);

        $ormawa=new Ormawa;
        $ormawa->nama='LD AL-Furqon FT-UNG';
        $ormawa->binaan='Fakultas Teknik';
        $ormawa->deskripsi="Lembaga Dakwah Fakultas Teknik";
        $ormawa->website="https://muslim.or.id";
        $ormawa->jenis="UKM";//'himpunan','UKM','paguyuban','luar_kampus',
        $ormawa->kategori="Religi";
        $ormawa->save();
        $mahasiswa->organisasi()->attach($ormawa->id, [
            'periode_dari' => '2017',
            'periode_sampai' => '2020',
            'suratbuktianggota' => '',
            'status'=>'valid',//'pending','valid','ditolak',
        ]);

        $ormawa=new Ormawa;
        $ormawa->nama='Generasi Baru Indonesia Gorontalo';
        $ormawa->binaan='Bank Indonesia';
        $ormawa->deskripsi="Komunitas mahasiswa penerima beasiswa BI, berperan sebagai duta bank indonesia untuk masyarakat";
        $ormawa->website="https://genbi.id";
        $ormawa->jenis="luar_kampus";//'himpunan','UKM','paguyuban','luar_kampus',
        $ormawa->kategori="Kepemimpinan";
        $ormawa->save();
        $mahasiswa->organisasi()->attach($ormawa->id, [
            'periode_dari' => '2019',
            'periode_sampai' => '2020',
            'suratbuktianggota' => '',
            'status'=>'valid',//'pending','valid','ditolak',
        ]);

        $this->command->info('Berhasil Menambahkan Koneksi Ormawa');

        $prestasi=new App\Models\Prestasi;
        $prestasi->sertifikat="ada";
        $prestasi->judul="FIT COMPETITION 2018";
        $prestasi->tanggal='2018-11-20 00:00:51';
        $prestasi->tingkat='Nasional';
        $prestasi->peringkat=6;
        $prestasi->lokasi='Salatiga';
        $prestasi->kategori='Web Programming';
        $prestasi->status='valid';
        $mahasiswa->prestasi()->save($prestasi);
        $this->command->info('Berhasil Menambahkan Prestasi');

        $prestasi=new App\Models\Prestasi;
        $prestasi->sertifikat="ada";
        $prestasi->judul="FIT COMPETITION 2019";
        $prestasi->tanggal='2019-11-20 00:00:51';
        $prestasi->tingkat='Nasional';
        $prestasi->peringkat=3;
        $prestasi->lokasi='Salatiga';
        $prestasi->kategori='Web Programming';
        $prestasi->status='valid';
        $mahasiswa->prestasi()->save($prestasi);
        $this->command->info('Berhasil Menambahkan Prestasi');


        $kegiatan=new App\Models\Kegiatan;
        $kegiatan->sertifikat="ada";
        $kegiatan->judul="Seminar Forensik 4.0";
        $kegiatan->tanggal='2018-12-02 00:00:51';
        $kegiatan->lokasi="Auditorium UNG";
        $kegiatan->penyelenggara="KSL-UNG";
        $kegiatan->status="valid";
        $mahasiswa->kegiatan()->save($kegiatan);
        $this->command->info('Berhasil Menambahkan Kegiatan');

        $kegiatan=new App\Models\Kegiatan;
        $kegiatan->sertifikat="ada";
        $kegiatan->judul="Seminar Ekonomi Digital BI";
        $kegiatan->tanggal='2019-12-02 00:00:51';
        $kegiatan->lokasi="Auditorium KPw BI Gorontalo";
        $kegiatan->penyelenggara="KPw BI Gorontalo";
        $kegiatan->status="valid";
        $mahasiswa->kegiatan()->save($kegiatan);
        $this->command->info('Berhasil Menambahkan Kegiatan');


        $ayah=new App\Models\Orangtua;
        $ayah->nama="Syafrudin Katili";
        $ayah->pekerjaan='2. PNS (Guru / Dosen)';
        $ayah->kategori_pekerjaan='4';
        $ayah->no_hp='081340416262';
        $ayah->pendidikan_terakhir='S2';
        $ayah->kategori_penghasilan='Rp. 3 juta - 5 juta';
        $ayah->nominal_penghasilan=5000000;
        $ayah->hubungan="ayah";
        $mahasiswa->orangtua()->save($ayah);
        $this->command->info('Berhasil Menambahkan Ayah');

        $ibu=new App\Models\Orangtua;
        $ibu->nama="Kartin Usman";
        $ibu->pekerjaan='2. PNS (Guru / Dosen)';
        $ibu->kategori_pekerjaan='4';
        $ibu->no_hp='082218399283';
        $ibu->pendidikan_terakhir='S2';
        $ibu->kategori_penghasilan='Rp. 3 juta - 5 juta';
        $ibu->nominal_penghasilan=5000000;
        $ibu->hubungan="ibu";
        $mahasiswa->orangtua()->save($ibu);
        $this->command->info('Berhasil Menambahkan Ibu');

        $nunu = new App\Models\Saudara;
        $nunu->nama='Siti Nur Qamariah Katili';
        $nunu->pendidikan_terakhir='SMA';
        $nunu->bekerja=0;
        $nunu->hubungan='kakak';
        $mahasiswa->saudara()->save($nunu);
        $this->command->info('Berhasil Menambahkan nunu');

        $tatan = new App\Models\Saudara;
        $tatan->nama='Moh. Tantawi Katili';
        $tatan->pendidikan_terakhir='SMA';
        $tatan->bekerja=0;
        $tatan->hubungan='adik';
        $mahasiswa->saudara()->save($tatan);
        $this->command->info('Berhasil Menambahkan tatan');

        $dilen = new App\Models\Saudara;
        $dilen->nama='Moh. Fajrin Katili';
        $dilen->pendidikan_terakhir='SMA';
        $dilen->bekerja=0;
        $dilen->hubungan='adik';
        $mahasiswa->saudara()->save($dilen);
        $this->command->info('Berhasil Menambahkan dilen');

        $gufron = new App\Models\Saudara;
        $gufron->nama='Moh. Gufron Katili';
        $gufron->pendidikan_terakhir='SMA';
        $gufron->bekerja=0;
        $gufron->hubungan='adik';
        $mahasiswa->saudara()->save($gufron);
        $this->command->info('Berhasil Menambahkan gufron');

        $rumah = new App\Models\Lokasi;
        $rumah->provinsi="GORONTALO";
        $rumah->kota="BONE BOLANGO";
        $rumah->kecamatan="KABILA";
        $rumah->kelurahan="TALANGO";
        $rumah->alamat_deskripsi="Jl. Sawah Besar, Desa Talango, Kec. Kabila";
        $rumah->kodepos='92568';
        $rumah->jenis='alamat_sekarang';
        $mahasiswa->lokasi()->save($rumah);
        $this->command->info('Berhasil Menambahkan alamat rumah');

        $asal = new App\Models\Lokasi;
        $asal->provinsi="GORONTALO";
        $asal->kota="BONE BOLANGO";
        $asal->kecamatan="KABILA";
        $asal->kelurahan="TALANGO";
        $asal->alamat_deskripsi="ini alamat asal saya juga lohhh!";
        $asal->kodepos='92568';
        $asal->jenis='alamat_asal';
        $mahasiswa->lokasi()->save($asal);
        $this->command->info('Berhasil Menambahkan alamat asal');


    }
}
