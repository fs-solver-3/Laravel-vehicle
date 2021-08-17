<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageUnreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_unreads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sender_id')->unsigned();
            $table->bigInteger('receiver_id')->unsigned()->nullable();
            $table->foreign('sender_id', 'fk_p_messge_unread_sender')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver_id', 'fk_p_messge_unread_receiver')->references('id')->on('users')->onDelete('cascade');
            $table->string('last_message')->nullable();
            $table->string('type')->nullable();
            $table->integer('unread')->nullable();
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
        Schema::dropIfExists('message_unreads');
    }
}
