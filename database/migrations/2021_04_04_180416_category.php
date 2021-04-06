<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('Category');
        Schema::create('Category', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name',50);
            $table->string('token',100)->nullable();
            $table->integer('status')->nullable()->unsigned();
            $table->string('images',100)->nullable();
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
        Schema::dropIfExists('Category');
    }
}
