<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverLisenceCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_lisence_categories', function (Blueprint $table) {
            $table->unsignedInteger('driver_lisence_id');
            $table->foreign('driver_lisence_id', 'fk_p_54415_54416_driver_lisence_per_556eec08408d0')->references('id')->on('driver_lisence')->onDelete('cascade');
            $table->unsignedInteger('lisence_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driver_lisence_categories');
    }
}
