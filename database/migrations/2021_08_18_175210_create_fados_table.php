<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fados', function (Blueprint $table) {
            $table->id();
            $table->string('fa2p1',500)->nullable();
            $table->string('fa2p2',500)->nullable();
            $table->string('fa2p3_1',300)->nullable();
            $table->string('fa2p3_2',300)->nullable();
            $table->string('fa2p3_3',300)->nullable();
            $table->string('fa2p3_4',300)->nullable();
            $table->string('fa2p3_5',300)->nullable();
            $table->string('fa2p3_6',300)->nullable();
            $table->string('fa2p3_7',300)->nullable();
            $table->string('idescenario')->nullable();
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
        Schema::dropIfExists('fados');
    }
}
