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
        Schema::create('restaurant_restaurant_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('rest_id');
            $table->Foreign('rest_id')->references('id')->on('restaurants')->onDelete('cascade');


            $table->unsignedBigInteger('cat_id');
            $table->Foreign('cat_id')->references('id')->on('restaurant_categories')->onDelete('cascade');

            $table->primary(['rest_id','cat_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_restaurant_categories');
    }
};
