<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booksites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('site_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('site_name');
            $table->string('user_name');
            $table->string('country')->nullable();
            $table->string('email');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('adults')->nullable();
            $table->string('children')->nullable();
            $table->string('duration');
            $table->bigInteger('card_number');
            $table->bigInteger('id_no');
            $table->string('holder_name');
            $table->string('nationality');
            $table->string('expiry_date');
            $table->integer('cvv_number');
            $table->string('amount');
            $table->string('status')->default('complete');
            $table->timestamps();

            $table->foreign('site_id')->references('id')->on('sites');
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
        Schema::dropIfExists('booksites');
    }
}
