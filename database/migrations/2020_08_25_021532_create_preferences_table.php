<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('preferences');
        Schema::create('preferences', function (Blueprint $table) {
            $table->increments('id');
            // $table->bigInterger('user_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id', 'fk_p_54415_54416_role_per_596eec08408d0')->references('id')->on('users')->onDelete('cascade');
            $table->string('dialog_allowed')->nullable();
            $table->string('music_allowed')->nullable();
            $table->string('smoking_allowed')->nullable();
            $table->string('pet_allowed')->nullable();
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
        Schema::dropIfExists('preferences');
    }
}
