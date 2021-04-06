<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Brand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::dropIfExists('Brand');
        Schema::create('Brand', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name',50);
            $table->string('images',100)->nullable();
            $table->string('logo',100)->nullable();
            $table->string('description',100)->nullable();
            $table->string('id_country',100)->nullable();
            $table->string('slug',100)->nullable();
            $table->integer('status')->nullable()->unsigned();
            $table->string('token',100)->nullable();
            $table->integer('quantity')->nullable()->unsigned();
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
        Schema::dropIfExists('Brand');
    }
}
