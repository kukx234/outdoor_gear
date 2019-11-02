<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('price');
            $table->string('description')->nullable();
            $table->string('title');
            $table->string('image')->nullable();
            $table->integer('sub_categories_id')->unsigned()->nullable();
            $table->integer('categories_id')->unsigned()->nullable();
            $table->integer('product_actions_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('sub_categories_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('product_actions_id')->references('id')->on('product_actions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
