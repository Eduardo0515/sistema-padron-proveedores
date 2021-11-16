<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_solicituds', function (Blueprint $table) {
            $table->id();
            $table->string('rfc', 20)->unique();
            $table->string('correo', 255);
            $table->string('password', 255);
            $table->string('telefono', 45);
            $table->string('extension', 45)->nullable();
            $table->string('tipo_persona', 25);
            $table->string('nombres', 255);
            $table->string('apellidos', 255);
            $table->string('razon_social', 255)->nullable();
            $table->string('capital_contable', 255);
            $table->string('domicilio', 255);
            $table->string('num_exterior', 45);
            $table->string('num_interior', 45)->nullable();
            $table->string('colonia', 255);
            $table->string('localidad', 255);
            $table->string('ciudad', 255);
            $table->string('entidad', 255);
            $table->string('pais', 255);
            $table->string('codigo_postal', 45);
            $table->decimal('latitud', 10, 8);
            $table->decimal('longitud', 10, 8);
            $table->rememberToken();
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
        Schema::dropIfExists('user_solicituds');
    }
}
