<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('apellido_pat');
            $table->string('apellido_mat');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('edad')->nullable();
            $table->integer('genero')->nullable();
            $table->integer('entidad')->nullable();
            $table->integer('pais')->nullable();
            $table->integer('experiencia_anios')->nullable();
            $table->integer('nivel_cine')->nullable();
            $table->integer('disciplina')->nullable();
            $table->integer('universidad')->nullable();
            $table->integer('periodo_escolar')->nullable();
            $table->integer('periodo')->nullable();
            $table->integer('tipo_usuario');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->date('fecha_nac');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
