<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultIdToSupportLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('support_levels', function (Blueprint $table) {
            //
            $table->integer('default_support_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('support_levels', function (Blueprint $table) {
            //
            $table->integer('default_support_id')->unsigned()->nullable();
        });
    }
}
