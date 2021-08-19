<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubirArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subir_archivos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('tipoarchivo')->nullable();
            $table->string('tipocat')->nullable();
            $table->string('id_usuario')->nullable();
            $table->string('ruta_archivo',200)->nullable();
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
        Schema::dropIfExists('subir_archivos');
    }
}
