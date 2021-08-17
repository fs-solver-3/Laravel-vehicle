<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportLevelsManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_levels_managers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('support_levels_id')->unsigned()->nullable();
            $table->foreign('user_id', 'fk_p_manager_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('support_levels_id', 'fk_p_5_support_levels_id')->references('id')->on('support_levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suport_levels_managers');
    }
}
