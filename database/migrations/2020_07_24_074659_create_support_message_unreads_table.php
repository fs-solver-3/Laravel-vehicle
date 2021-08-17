<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportMessageUnreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_message_unreads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->references('id')->on('users')->onDelete('cascade');;
            $table->integer('receiver_id')->unsigned()->nullable();
            $table->integer('support_id')->unsigned()->nullable();
            $table->integer('channel_name')->unsigned()->nullable();
            $table->text('last_message')->nullable();
            $table->integer('unread')->nullable();
            $table->boolean('complete')->default(false);
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
        Schema::dropIfExists('support_message_unreads');
    }
}