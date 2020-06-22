<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrmawasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ormawas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('binaan');//fakultas A, prodi C, universitas,
            $table->longtext('deskripsi');
            $table->string('website');
            $table->enum('jenis',[
                'himpunan',
                'UKM',
                'paguyuban',
                'luar_kampus',
            ])->nullable();
            $table->string('kategori',20)->nullable();//pendidikan, teknologi, intrakampus
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
        Schema::dropIfExists('ormawas');
    }
}
