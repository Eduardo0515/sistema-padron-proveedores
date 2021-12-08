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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id')
                ->references('id')
                ->on('tbl_menus')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('ver')->nullable();
            $table->integer('agregar')->nullable();
            $table->integer('editar')->nullable();
            $table->integer('eliminar')->nullable();
            $table->integer('impresion')->nullable();
            $table->integer('exportar')->nullable();
            $table->integer('validar')->nullable();
            $table->integer('estatus')->nullable();
            $table->unsignedBigInteger('user_created');
            $table->foreign('user_created')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->date('fecha_created')->nullable();
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
        Schema::dropIfExists('users_menus');
    }
}
