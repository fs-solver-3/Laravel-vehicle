<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMaxOccupantsToListingStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listing_stops', function (Blueprint $table) {
            //
            $table->integer('max_occupants')->nullable();
            $table->float('time')->nullable();
            $table->float('distance')->nullable();
            $table->boolean('active')->default(true);
            $table->string('starting_hour')->nullable();
            $table->integer('price_per_seat')->nullable();
            $table->integer('capacity')->nullable();
            $table->integer('place')->nullable();
            $table->integer('max_size')->nullable();
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
        Schema::table('listing_stops', function (Blueprint $table) {
            //
        });
    }
}
