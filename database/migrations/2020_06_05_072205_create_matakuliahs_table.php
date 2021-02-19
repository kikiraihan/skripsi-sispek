<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatakuliahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->char('sks',5);
            $table->string('kodemk');
            //->unique(), belum boleh unik, untuk merekam perubahan mk,
            //jadi siap2 bahwa akan ada duplikasi kodemk, maka akses mk adalah per ID bukan kodem mk

            //unik hanya pada kombinasi ketiga nama dibawah
            $table->unique(['nama','sks','kodemk']);
            
            $table->enum('prodi',['S1 - Sistem Informasi','S1 - Pendidikan Teknologi Informasi'])
            ->nullable();//kembangkan jadi table baru

            $table->enum('rumpun',[
                'web programming',
                'desktop programming',
                'mobile programming',
                'algoritma',
                'database',
                'desain visual',
                'pendidikan',
                'teori profesi',
            ])->nullable();
            //
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
        Schema::dropIfExists('matakuliahs');
    }
}
