<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('from_city')->nullable();
            $table->string('from_full')->nullable();
            $table->string('to_city')->nullable();
            $table->string('to_full')->nullable();
            $table->string('type')->nullable();
            $table->string('place')->nullable();
            $table->string('capacity')->nullable();
            $table->string('starting_date')->nullable();
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
        Schema::dropIfExists('search_trips');
    }
}
