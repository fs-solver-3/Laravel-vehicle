<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingCargotypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listing_cargotype', function (Blueprint $table) {
            $table->bigInteger('listing_id')->unsigned()->nullable();
            $table->foreign('listing_id', 'fk_p_54416_54418_listing_596eec0af3740')->references('id')->on('listings')->onDelete('cascade');
            $table->bigInteger('cargo_type_id')->unsigned()->nullable();
            $table->foreign('cargo_type_id', 'fk_p_54417_54418_cargotype_596eec0af37c5')->references('id')->on('cargo_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listing_cargotype');
    }
}
