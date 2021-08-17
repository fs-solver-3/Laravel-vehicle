<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('listing_id')->unsigned();
            $table->foreign('listing_id', 'fk_p_54416_54418_user_rol_596eec0af3843')->references('id')->on('listings')->onDelete('cascade');
            $table->string('location');
            $table->dateTime('time')->nullable();
            $table->float('distance')->nullable();
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
        Schema::dropIfExists('stops');
    }
}
