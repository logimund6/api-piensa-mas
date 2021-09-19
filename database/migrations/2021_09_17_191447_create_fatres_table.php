<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFatresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fatres', function (Blueprint $table) {
            $table->id();
            $table->string('fa3p1',500)->nullable();
            $table->string('fa3p2_1',500)->nullable();
            $table->string('fa3p2_2',500)->nullable();
            $table->string('fa3p2_3',500)->nullable();
            $table->string('fa3p2_4',500)->nullable();
            $table->string('fa3p2_5',500)->nullable();
            $table->string('fa3p3_1',1000)->nullable();
            $table->string('fa3p3_2',1000)->nullable();
            $table->string('fa3p3_3',1000)->nullable();
            $table->string('fa3p3_4',1000)->nullable();
            $table->string('fa3p3_5',1000)->nullable();
            $table->string('idescenario',10)->nullable();
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
        Schema::dropIfExists('fatres');
    }
}
