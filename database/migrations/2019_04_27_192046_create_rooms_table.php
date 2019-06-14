<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('no_of_rooms');
            $table->string('size_type');
            $table->string('size');
            // $table->string('capacity');
            $table->string('room_no');
            $table->string('image');
            $table->string('desciption');
            $table->integer('beds');
            $table->bigInteger('hotel_id')->unsigned();
            $table->integer('cost');
            $table->string('status')->default('never_booked');

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
        Schema::dropIfExists('rooms');
    }
}
