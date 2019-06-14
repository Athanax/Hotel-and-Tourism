<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookhotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookhotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hotel_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('name');
            $table->integer('no_of_rooms');
            $table->string('country')->nullable();
            $table->string('email');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->bigInteger('room_id')->unsigned();
            $table->string('room_no');            
            $table->string('check_out');
            $table->string('check_in');
            $table->string('amount');
            $table->string('status')->default('complete');
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookhotels');
    }
}
