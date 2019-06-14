<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('site_id')->unsigned();
            $table->string('name');
            $table->string('type');
            $table->longText('about');
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('email');
            $table->string('cover_1');
            $table->string('cover_2');
            $table->string('cover_3');
            $table->string('country');
            $table->string('about_image');
            $table->string('phone_1');
            $table->string('phone_2');            
            $table->longText('cover_text')->nullable();
            $table->string('latitude')->nullable();
            $table->string('stars');
            $table->string('longitude')->nullable();
            $table->string('status')->default('images');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('site_id')->references('id')->on('sites');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
