<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiroPadronTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giro_padron', function (Blueprint $table) {
            $table->unsignedBigInteger('giro_id');
            $table->foreign('giro_id')
                ->references('id')
                ->on('giros')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('giro_padron');
    }
}
