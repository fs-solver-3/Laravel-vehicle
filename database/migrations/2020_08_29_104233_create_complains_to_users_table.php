<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplainsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('comment');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('complain_id')->unsigned()->nullable();
            $table->bigInteger('listing_id')->unsigned()->nullable();
            $table->bigInteger('driver_id')->unsigned()->nullable();
            $table->foreign('user_id', 'fk_complain_users_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('complain_id', 'fk_complain_users_complain')->references('id')->on('complains')->onDelete('cascade');
            $table->foreign('listing_id', 'fk_complain_users_listing')->references('id')->on('listings')->onDelete('cascade');
            $table->foreign('driver_id', 'fk_complain_users_driver')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('complains_to_users');
    }
}
