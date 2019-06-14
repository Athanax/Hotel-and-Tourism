<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotelrates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hotel_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('amount');
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotelrates');
    }
}
