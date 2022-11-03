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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('materials');
            $table->float('price');

            $table->string('image_path')->nullable();

            $table->unsignedBigInteger('cat_id');
            $table->Foreign('cat_id')->references('id')->on('food_categories')->onDelete('cascade');

            $table->unsignedBigInteger('restaurant_id');
            $table->Foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');

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
        Schema::dropIfExists('food');
    }
};
