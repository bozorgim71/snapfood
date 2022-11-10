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
        Schema::create('food_parties', function (Blueprint $table) {

            $table->id();
            $table->time('start');
            $table->time('end');
            $table->date('date')->nullable();
            $table->float('present');
            $table->unsignedBigInteger('food_id');
            $table->Foreign('food_id')->references('id')->on('food')->onDelete('cascade');

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
        Schema::dropIfExists('food_parties');
    }
};
