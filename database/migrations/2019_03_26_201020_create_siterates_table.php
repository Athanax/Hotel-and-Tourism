<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siterates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('site_id')->unsigned()->unique();
            $table->string('citizen_child');
            $table->string('citizen_adult');
            $table->string('resident_adult');
            $table->string('resident_child');
            $table->string('non_resident_child');
            $table->string('non_resident_adult');

            $table->timestamps();

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
        Schema::dropIfExists('siterates');
    }
}
