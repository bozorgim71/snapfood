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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->string('message');
            $table->string('answer')->nullable();
            $table->string('status')->default('received');

            $table->integer('score');

            $table->unsignedBigInteger('restaurant_id');
            $table->Foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->Foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('order_id');
            $table->Foreign('order_id')->references('id')->on('orders')->onDelete('cascade');;

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
        Schema::dropIfExists('comments');
    }
};
