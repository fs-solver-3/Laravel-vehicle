<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_stops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('listing_id')->unsigned()->nullable();
            $table->foreign('listing_id', 'fk_p_54416_54418_listing_596eec0af3746')->references('id')->on('listings')->onDelete('cascade');
            $table->bigInteger('location_id')->unsigned()->nullable();
            $table->foreign('location_id', 'fk_p_54417_54418_location_596eec0af37c1')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listing_stops');
    }
}
