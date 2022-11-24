<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_food_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('food_id');
            $table->Foreign('food_id')->references('id')->on('food')->onDelete('cascade');


            $table->unsignedBigInteger('cat_id');
            $table->Foreign('cat_id')->references('id')->on('food_categories')->onDelete('cascade');

            $table->primary(['food_id','cat_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_food_categories');
    }
};
