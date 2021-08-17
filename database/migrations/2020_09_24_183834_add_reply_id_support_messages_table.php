<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReplyIdSupportMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('support_messages', function (Blueprint $table) {
            //
            $table->string('attach_name')->nullable();
            $table->string('attach_type')->nullable();
            $table->integer('reply_message_id')->nullable();
            $table->integer('room_id')->nullable();
            $table->boolean('edited')->nullable();
            $table->boolean('deleted')->nullable();
            $table->boolean('seen')->nullable();
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('support_messages', function (Blueprint $table) {
            //
        });
    }
}
