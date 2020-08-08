<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKontrakMatakuliah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrak_matakuliah', function (Blueprint $table) {
            $table->foreignId('id_mahasiswa')->constrained('mahasiswas')->onDelete('cascade');//FK
            $table->foreignId('id_matakuliah')->constrained('matakuliahs')->onDelete('cascade');//FK
            $table->primary(['id_mahasiswa','id_matakuliah']);

            $table->enum('nilai_mutu',[
                '',
                'A','B','C','D','E',
                'A-','B-','C-','D-',
                'B+','C+','D+','E+',
            ]);
            $table->double('angka_mutu', 3, 2)->nullable()->default(0.00);
            $table->char('semester',5);


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
        Schema::dropIfExists('kontrak_matakuliah');
    }
}
