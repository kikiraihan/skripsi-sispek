<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterkriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masterkriterias', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('model_type');
            $table->enum('jenis',[
                'angka',
                'non angka'
            ]);
            $table->string('pathTo',255);
            $table->string('rasio',255)->nullable();

            //unik hanya pada kombinasi ketiga nama dibawah
            $table->unique(['model_type','pathTo']);

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
        Schema::dropIfExists('masterkriterias');
    }
}
