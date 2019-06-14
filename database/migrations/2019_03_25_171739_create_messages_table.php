<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('body');
            $table->bigInteger('s_id')->unsigned();
            $table->bigInteger('r_id')->unsigned();
            $table->string('status')->default('unread');
            $table->timestamps();

            $table->foreign('s_id')->references('id')->on('users');
            $table->foreign('r_id')->references('id')->on('users');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
