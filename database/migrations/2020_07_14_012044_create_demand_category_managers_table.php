<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandCategoryManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demand_category_managers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('demand_category_id')->unsigned()->nullable();
            // $table->foreign('user_id', 'fk_p_manager_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('demand_category_id', 'fk_p_5_demand_category_id')->references('id')->on('demand_categories')->onDelete('cascade');
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
        Schema::dropIfExists('demand_category_managers');
    }
}
