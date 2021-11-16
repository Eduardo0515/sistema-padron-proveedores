<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_proveedors', function (Blueprint $table) {
            $table->id();
            $table->string('rfc', 20)->unique();
            $table->string('correo', 255);
            $table->string('password', 255);
            $table->unsignedBigInteger('tipo_persona')->nullable();
            $table->foreign('tipo_persona')
                ->references('id')
                ->on('tipo_personas')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->string('razon_social', 255)->nullable();
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
        Schema::dropIfExists('user_proveedors');
    }
}
