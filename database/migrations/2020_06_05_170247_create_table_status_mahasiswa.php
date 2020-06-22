<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStatusMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_mahasiswa', function (Blueprint $table) {
            $table->foreignId('id_mahasiswa')->constrained('mahasiswas');//FK
            $table->foreignId('id_tahunakademik')->constrained('tahunakademiks');//FK
            $table->primary(['id_mahasiswa','id_tahunakademik']);

            $table->enum('status',[
                'aktif',
                'non aktif',
                'cuti',
                'drop out',
                'lulus',
                'keluar',
            ]);

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
        Schema::dropIfExists('status_mahasiswa');
    }
}
