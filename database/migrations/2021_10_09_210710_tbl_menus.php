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
            $table->string('menu', 120)->nullable();
            $table->string('clave', 80)->nullable();
            $table->integer('ver')->nullable();
            $table->integer('agregar')->nullable();
            $table->integer('editar')->nullable();
            $table->integer('eliminar')->nullable();
            $table->integer('impresion')->nullable();
            $table->integer('exportar')->nullable();
            $table->integer('validar')->nullable();
            $table->integer('estatus')->nullable();
            $table->integer('parentid')->nullable();
            $table->integer('sub_menu')->nullable();
            $table->string('descripcion', 120)->nullable();
            $table->string('icono', 30)->nullable();
            $table->integer('orden')->nullable();
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
