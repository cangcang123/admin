<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('Product');
        Schema::create('Product', function (Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->id();
            $table->string('name',50);
            $table->string('description',900)->nullable();
            $table->string('cover_photo_url',100)->nullable();
            $table->string('subDescription',100)->nullable();
            $table->string('total_comment',100)->nullable();
            $table->integer('image_urls')->nullable()->unsigned();
            $table->integer('price')->unsigned();
            $table->integer('commission')->nullable()->unsigned();
            $table->integer('referral_commission')->nullable()->unsigned();
            $table->integer('quantity')->unsigned();
            $table->integer('category_id')->nullable()->unsigned();
            $table->integer('brand_id')->nullable()->unsigned();
            $table->integer('rating')->nullable()->unsigned();
            $table->integer('country_id')->nullable()->unsigned();
            $table->integer('total_like')->nullable()->unsigned();
            $table->integer('discount')->nullable()->unsigned();
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
         Schema::dropIfExists('Product');
    }
}
