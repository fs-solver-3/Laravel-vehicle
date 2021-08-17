<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->index();
            $table->bigInteger('location_id')->unsigned()->index();
            $table->foreign('location_id', 'fk_p_location_listing')->references('id')->on('locations')->onDelete('cascade');
            $table->integer('destination_id')->index();
            $table->string('type')->nullable();
            $table->date('starting_date');
            $table->integer('max_occupants')->nullable();
            $table->string('additional_info')->nullable();
            $table->boolean('active')->default(true);
            $table->float('time');
            $table->float('distance');
            $table->string('covid19_title')->nullable();
            $table->string('covid19_desc')->nullable();
            $table->integer('truck_id')->index()->nullable();
            $table->integer('car_id')->index()->nullable();
            $table->integer('price_per_seat');
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
        Schema::dropIfExists('listings');
    }
}
