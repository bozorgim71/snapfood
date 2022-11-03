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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();;
            $table->string('phone');
            $table->string('account');
            $table->string('address');
            $table->float('latitude');
            $table->float('longitude');
            $table->string('image_path')->nullable();
            $table->unsignedBigInteger('cat_id');
            $table->Foreign('cat_id')->references('id')->on('restaurant_categories')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->Foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('restaurants');
    }
};
