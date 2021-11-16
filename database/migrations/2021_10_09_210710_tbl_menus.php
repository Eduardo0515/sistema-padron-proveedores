<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu');
            $table->string('clave');
            $table->integer('ver');
            $table->integer('agregar');
            $table->integer('editar');
            $table->integer('eliminar');
            $table->integer('impresion');
            $table->integer('exportar');
            $table->integer('validar');
            $table->integer('estatus');
            $table->integer('parentid');
            $table->integer('sub_menu');
            $table->string('descripcion');
            $table->string('icono');
            $table->integer('orden');
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
        Schema::dropIfExists('tbl_menus');
    }
}
