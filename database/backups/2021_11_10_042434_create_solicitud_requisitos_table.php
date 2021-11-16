<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudRequisitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_requisitos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('ruta', 255);
            $table->unsignedBigInteger('solicitud_id');
            $table->foreign('solicitud_id')
                ->references('id')
                ->on('solicituds')
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
        Schema::dropIfExists('solicitud_requisitos');
    }
}
