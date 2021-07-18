<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatUniversidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_universidades', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('descripcion')->nullable();
            $table->integer('idpais')->nullable();
            $table->enum('estado',['I','A'])->default('I');
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
        Schema::dropIfExists('cat_universidades');
    }
}
