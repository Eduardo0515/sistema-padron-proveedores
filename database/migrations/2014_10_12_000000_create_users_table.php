<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 255);
            $table->string('email', 255)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('nombres', 120)->nullable();
            $table->string('apellidos', 45)->nullable();
            $table->string('area_labora', 45)->nullable();
            $table->string('tel_oficina', 45)->nullable();
            $table->string('extension', 45)->nullable();
            $table->string('celular', 45)->nullable();
            $table->text('img_avatar')->nullable();
            $table->boolean('is_admin')->default(1);
            $table->unsignedBigInteger('user_created')->nullable();
            $table->foreign('user_created')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('user_updated')->nullable();
            $table->foreign('user_updated')
                ->references('id')
                ->on('users');
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
