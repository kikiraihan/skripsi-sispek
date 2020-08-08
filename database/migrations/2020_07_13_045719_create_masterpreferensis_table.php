<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterpreferensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masterpreferensis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_user')->constrained('users')->onDelete('cascade')->nullable();//FK
            $table->string('catatan',900)->nullable();

            $table->string('judul');
            $table->string('model_type');

            $table->tinyInteger('ordo');
            $table->longText('matriks')->nullable();
            $table->longText('matriksNormalised')->nullable();
            $table->string('kriteria',900);


            /*[
                {"master":"idAgama","jenis":"Benefit","bobot":0.4201001643982254},
                {"master":"idTOEFL","jenis":"Benefit","bobot":0.11047011382945619},
                {"master":"idIPK","jenis":"Benefit","bobot":0.230677645835823},
                {"master":"idMasak","jenis":"Benefit","bobot":0.06109623583789261},
                {"master":"idKecantikan","jenis":"Benefit","bobot":0.17765584009860275}
                ]
            */
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
        Schema::dropIfExists('masterpreferensis');
    }
}
