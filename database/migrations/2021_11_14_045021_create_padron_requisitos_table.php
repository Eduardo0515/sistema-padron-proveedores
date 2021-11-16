<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePadronRequisitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padron_requisitos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('ruta', 255);
            $table->unsignedBigInteger('requisito_id');
            $table->unsignedBigInteger('padron_id');
            $table->foreign('padron_id')
                ->references('id')
                ->on('padrons')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('padron_requisitos');
    }
}
