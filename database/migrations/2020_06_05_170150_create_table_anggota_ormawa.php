<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAnggotaOrmawa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_ormawa', function (Blueprint $table) {

            $table->foreignId('id_mahasiswa')->constrained('mahasiswas');//FK
            $table->foreignId('id_ormawa')->constrained('ormawas');//FK
            //set PK
            $table->primary(['id_mahasiswa','id_ormawa']);

            $table->char('periode_dari',10);//2012
            $table->char('periode_sampai',10)->nullable();//2017
            $table->string('suratbuktianggota')->nullable();
            $table->enum('status',[
                'pending',
                'valid',
                'ditolak',
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
        Schema::dropIfExists('anggota_ormawa');
    }
}
