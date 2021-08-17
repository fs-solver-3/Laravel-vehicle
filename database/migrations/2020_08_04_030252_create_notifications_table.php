<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('notification_broswer')->default(true);
            $table->boolean('mailing_news')->default(true);
            $table->boolean('mailing_messages')->default(true);
            $table->boolean('mailing_notification_driver')->default(true);
            $table->boolean('mailing_notification_trip')->default(true);
            $table->boolean('sms_notication_message')->default(true);
            $table->boolean('sms_notification_trip')->default(true);
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
        Schema::dropIfExists('notifications');
    }
}
