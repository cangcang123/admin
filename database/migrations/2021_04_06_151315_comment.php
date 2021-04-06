<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::dropIfExists('Comment');
        Schema::create('Comment', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->integer('id_user')->nullable();
            $table->string('title',100)->nullable();
            $table->string('content',100)->nullable();
            $table->integer('image_urls')->nullable()->unsigned();
            $table->integer('product_id')->nullable()->unsigned();
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
         Schema::dropIfExists('Comment');
    }
}
