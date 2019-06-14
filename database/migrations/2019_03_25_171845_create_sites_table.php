<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('user_id')->unsigned()->unique();
            $table->string('type');
            $table->string('slag');
            $table->longText('slider_text');
            $table->string('cover_1');
            $table->string('cover_2');
            $table->string('cover_3');
            $table->longText('overview');
            $table->string('overview_image');
            $table->longText('route');
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('counrty')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('google_plus')->nullable();
            $table->longText('about');
            $table->string('status')->default('rates');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('sites');
    }
}
