<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrangtuasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orangtuas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mahasiswa')->constrained('mahasiswas');//FK

            $table->string('nama');
            $table->enum('pekerjaan',
            [
                '1. PNS (bukan Guru / Dosen)',
                '2. PNS (Guru / Dosen)',
                '3. TNI / POLRI',
                '4. Petani / Nelayan',
                '5. Buruh',
                "6. Pegawai swasta (bukan Guru/Dosen)",
                "7. Pegawai swasta (Guru / Dosen)",
                "8. Pegawai BUMN / BUMD",
                "9. Wiraswasta / Eksekutif / Pedagang",
                '10. Profesional Perorangan',
                "11. Pensiunan PNS / TNI / POLRI",
                '12. Pensiunan swasta',
                '13. Purnawirawan / Veteran',
                '14. Rohaniawan',
                '88. Tidak Bekerja',
                '99. Lainnya',
            ]);
            $table->enum('kategori_pekerjaan',
            [
                'Tidak bekerja',
                '1',
                '2',
                '3',
                '4',
                '5',
            ]);
            // Kategori 1 : PNS Gol. I, PNS Gol. II, Pensiunan PNS Gol. I, Pensiunan PNS Gol. II, Pensiunan PNS Gol. III, KAUR, Bintara, Tamtama, Bintara Tinggi, Supir, Kuli Bangunan, Buruh Tani, Tukang Parkir
            // Kategori 2 : PNS Gol. III, Pensiunan PNS Gol. IV, Pejabat Eselon IV, Kepala Seksi, Kepala Sub Bagian, Supervisor, Perwira Pertama
            // Kategori 3 : PNS Gol. IV, Pejabat Eselon III, Kepala Bagian, Pengusaha Mikro dan Kecil, Asisten Manager, Perwira Menengah
            // Kategori 4 : Pejabat Eselon II, Dekan, Kepala Dinas, Kepala Biro, Manager
            // Kategori 5 : Pejabat Eselon I, Pejabat Tinggi Negara, Perwira Tinggi, Kepala Daerah, Rektor, Guru Besar, Anggota Legislatif, Pengusaha Besar dan Menengah, Direksi

            $table->char('no_hp',40);
            $table->string('pendidikan_terakhir');
            $table->enum('kategori_penghasilan',
            [
                '< Rp. 1 juta',
                'Rp. 1 juta - 3 juta',
                'Rp. 3 juta - 5 juta',
                'Rp. 5 juta - 10 juta',
                '> Rp. 10 juta',
            ]);
            $table->integer('nominal_penghasilan');
            $table->enum('hubungan',['ayah','ibu','wali']);//ayah, ibu, wali

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orangtuas');
    }
}
