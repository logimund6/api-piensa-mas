<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubirDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subir_datas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('autor')->nullable();
            $table->string('palabrasclave')->nullable();
            $table->string('tematica')->nullable();
            $table->string('descripcion',100)->nullable();
            $table->string('ruta',200)->nullable();
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
        Schema::dropIfExists('subir_datas');
    }
}
