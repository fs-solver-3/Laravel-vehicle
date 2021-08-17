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
            $table->integer('user_id')->unsigned();
            $table->text('body');
            $table->integer('reply_message_id')->nullable();
            $table->integer('room_id')->nullable();
            $table->boolean('edited')->default(false);
            $table->boolean('deleted')->default(false);
            $table->string('attach_url')->nullable();
            $table->string('attach_name')->nullable();
            $table->string('attach_type')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
