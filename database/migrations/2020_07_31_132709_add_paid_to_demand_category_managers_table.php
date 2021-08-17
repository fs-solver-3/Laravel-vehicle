<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaidToDemandCategoryManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demand_category_managers', function (Blueprint $table) {
            //
            $table->boolean('see_message')->default(true);
            $table->boolean('receive_notification')->default(true);
            $table->boolean('receive_update_notification')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demand_category_managers', function (Blueprint $table) {
            //
        });
    }
}
