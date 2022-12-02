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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('status')->default('ordered');
            $table->integer('code');

            $table->string('foods_id');
            $table->string('foods_name');
            $table->string('foods_count');

            $table->float('cost');

            $table->unsignedBigInteger('user_id');
            $table->Foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('restaurant_id');
            $table->Foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');;

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
        Schema::dropIfExists('orders');
    }
};
