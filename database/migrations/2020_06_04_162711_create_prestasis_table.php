<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mahasiswa')->constrained('mahasiswas');//FK
            $table->string('sertifikat');
            $table->string('judul');
            $table->date('tanggal');
            $table->string('tingkat',20);//nasional, kampus, provinsi dll
            $table->char('peringkat',7);//1,2,3
            $table->string('lokasi');
            $table->string('kategori');//sains, teknologi, public speaking,
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
        Schema::dropIfExists('prestasis');
    }
}
