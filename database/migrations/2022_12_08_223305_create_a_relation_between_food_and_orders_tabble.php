<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('food_id');
            $table->Foreign('food_id')->references('id')->on('food')->onDelete('cascade');

            $table->unsignedBigInteger('order_id');
            $table->Foreign('order_id')->references('id')->on('orders')->onDelete('cascade');


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
        Schema::dropIfExists('food_orders');
    }
};
