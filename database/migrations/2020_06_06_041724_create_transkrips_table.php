<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranskripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transkrips', function (Blueprint $table) {
            $table->id();
            // id_mahasiswa
            $table->foreignId('id_mahasiswa')->constrained('mahasiswas')->onDelete('cascade');//FK
            // file
            $table->string('file');
            $table->longtext('catatan')->nullable();
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
        Schema::dropIfExists('transkrips');
    }
}
