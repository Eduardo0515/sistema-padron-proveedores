<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblcDependenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblc_dependencias', function (Blueprint $table) {
            $table->id();
            $table->string("dependencia", 180)->nullable();
            $table->string("parentid", 45)->nullable();
            $table->integer("nivel")->nullable();
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
        Schema::dropIfExists('tblc_dependencias');
    }
}
