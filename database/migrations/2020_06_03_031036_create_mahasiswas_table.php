<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');//FK
            $table->foreignId('id_dosen_pa')->nullable()->constrained('dosens');//FK

            $table->string('nama',50);
            $table->char('nim',25)->unique();
            $table->string('angkatan',15);
            $table->enum('prodi',['S1 - Sistem Informasi','S1 - Pendidikan Teknologi Informasi']);//kembangkan jadi table baru
            $table->timestamp('tgl_lahir')->nullable();
            $table->string('tempat_lahir',55)->nullable();
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan'])->nullable();
            $table->enum('golongan_darah',[
                "O",
                "A",
                "A+",
                "B",
                "B+",
                "AB",
            ])->nullable();
            $table->enum('agama',[
                'Islam','Kristen','Katolik','Konghuchu','Hindu','Budha','Lainnya'
                ])->nullable();
            $table->boolean('status_menikah')->nullable()->default(false);
            $table->enum('asuransi',
            [
                '-',
                'JAMKESMAS',
                'JAMKESMAN',
                'JAMKESDA',
                'BPJS',
                'JAMKESTA',
                'Kelurga Sejahtera (KKS)',
                'Program Keluarga Harapan (PKH)',
            ])->nullable()->default('-');
            $table->char('no_ktp',40)->nullable()->unique();
            $table->char('no_hp',40)->nullable()->unique();

            //tabel ipksebelumnya



            //tabel minat dan bakat

            //tabel lokasi(alamat sekarang, asal, tempat lahir)


            //tabel saudara

            //tabel orangtua

            //tabel anggota ormawa...........

            //tabel kegiatan

            //tabel prestasi/lomba

            //tabel kontrak mk...........


            //tabel mahasiswa aktif
            //$table->string('status',10);


            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
