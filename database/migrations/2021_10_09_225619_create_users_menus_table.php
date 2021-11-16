<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_menus', function (Blueprint $table) {
            $table->bigInteger('user_id');
            $table->integer('menu_id')->primary();
            $table->integer('ver');
            $table->integer('agregar');
            $table->integer('editar');
            $table->integer('eliminar');
            $table->integer('impresion');
            $table->integer('exportar');
            $table->integer('validar');
            $table->integer('estatus');
            $table->bigInteger('user_created');
            $table->date('fecha_created');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_menus');
    }
}
