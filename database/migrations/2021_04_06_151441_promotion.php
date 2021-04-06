<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Promotion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('Promotion');
        Schema::create('Promotion', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('type')->nullable()->unsigned();
            $table->integer('product_id')->nullable()->unsigned();
            $table->integer('discount')->nullable()->unsigned();
            $table->integer('used_time')->nullable()->unsigned();
            $table->integer('min_commission')->nullable()->unsigned();
            $table->integer('max_used_time')->nullable()->unsigned();
            $table->string('code',10)->nullable();
            $table->string('end_date')->nullable();
            $table->string('start_date')->nullable();
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
        Schema::dropIfExists('Promotion');
    }
}
