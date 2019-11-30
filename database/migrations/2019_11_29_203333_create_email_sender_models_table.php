<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailSenderModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_sender_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('week_day');
            $table->string('time');
            $table->string('subject');
            $table->text('content');
            $table->integer('isSend');
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
        Schema::dropIfExists('email_sender_models');
    }
}
