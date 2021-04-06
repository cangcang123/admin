<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Customer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('Customer');
        Schema::create('Customer', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name',50);
            $table->string('address',100);
            $table->string('ward',20);
            $table->string('district',20);
            $table->string('city',20);
            $table->integer('phone')->unsigned();
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
         Schema::dropIfExists('Customer');
    }
}
