<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaudarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saudaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mahasiswa')->constrained('mahasiswas');//FK

            $table->string('nama');
            $table->enum('pendidikan_terakhir',[
                'tidak sekolah',
                'SD',
                'SMP',
                'SMA',
                'S1',
                'S2',
                'S3',
            ]);
            $table->boolean('bekerja')->nullable()->default(false);
            $table->enum('hubungan',['kakak','adik']);//kakak, adik

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
        Schema::dropIfExists('saudaras');
    }
}
