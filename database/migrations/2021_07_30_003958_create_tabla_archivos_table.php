<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaArchivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabla_archivos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('descripcion',200)->nullable();
            $table->string('autor')->nullable();
            $table->string('palabrasclave')->nullable();
            $table->string('tematica')->nullable();
            $table->string('tipo_cat')->nullable();
            $table->string('op_disponible')->nullable();
            $table->string('estatus')->nullable();
            $table->string('id_admin')->nullable();
            $table->string('id_archivo')->nullable();
            $table->string('url',100)->nullable();
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
        Schema::dropIfExists('tabla_archivos');
    }
}
