<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscenariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escenarios', function (Blueprint $table) {
            $table->id();

            $table->string('titulo')->nullable();
            $table->string('nivel',100)->nullable();
            $table->string('educacion')->nullable();
            $table->string('tema')->nullable();
            $table->string('palabras_clave',200)->nullable();
            $table->string('estado')->nullable();
            $table->string('idusuario')->nullable();
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
        Schema::dropIfExists('escenarios');
    }
}
