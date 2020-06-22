<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahunakademiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tahunakademiks', function (Blueprint $table) {
            $table->id();
            $table->char('tahun_akademik',9);//2012
            $table->enum('semester',[
                'genap',
                'ganjil',
            ]);
            $table->enum('status_aktif',[
                'aktif',
                'non aktif',
            ])->nullable();
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
        Schema::dropIfExists('tahunakademiks');
    }
}
