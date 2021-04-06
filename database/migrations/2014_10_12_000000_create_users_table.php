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
        Schema::dropIfExists('user');
        Schema::create('user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('full_name',50);
            $table->integer('username')->unsigned();
            $table->string('email',50)->nullable()->unique();
            $table->integer('phone')->unsigned();
            $table->integer('id_Pay')->nullable()->unsigned();
            $table->string('referral_code',50)->nullable();
            $table->integer('wallet')->nullable()->unsigned();
            $table->integer('active')->nullable()->unsigned();
            $table->integer('adgroup')->nullable()->unsigned();
            $table->boolean('gender')->nullable();
            $table->integer('max_invite')->unsigned();
            $table->string('adress',50)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('user');
    }
}
