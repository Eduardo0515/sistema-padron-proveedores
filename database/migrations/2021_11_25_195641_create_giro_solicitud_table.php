<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiroSolicitudTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giro_solicitud', function (Blueprint $table) {
            $table->unsignedBigInteger('giro_id');
            $table->foreign('giro_id')
                ->references('id')
                ->on('giros')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('giro_solicitud');
    }
}
