<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStateIdToDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demands', function (Blueprint $table) {
            //
            $table->integer('demand_status_id')->unsigned()->nullable();
            $table->integer('demand_criticality_id')->unsigned()->nullable();
            $table->integer('demand_complexity_id')->unsigned()->nullable();
            $table->integer('demand_score_id')->unsigned()->nullable();
            $table->integer('demand_level_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demands', function (Blueprint $table) {
            //
        });
    }
}
