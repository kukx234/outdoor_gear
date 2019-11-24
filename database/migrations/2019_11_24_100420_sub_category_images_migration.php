<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubCategoryImagesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_category_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sub_categories_id')->unsigned();
            $table->string('image');
            $table->timestamps();

            $table->foreign('sub_categories_id')->references('id')->on('sub_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_category_images');
    }
}
