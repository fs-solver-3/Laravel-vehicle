<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruckCargotypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_cargotype', function (Blueprint $table) {
            $table->bigInteger('truck_id')->unsigned()->nullable();
            $table->foreign('truck_id', 'fk_p_54416_54418_user_rol_596eec0af3740')->references('id')->on('trucks')->onDelete('cascade');
            $table->bigInteger('cargo_type_id')->unsigned()->nullable();
            $table->foreign('cargo_type_id', 'fk_p_54417_54418_role_use_596eec0af37c5')->references('id')->on('cargo_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('truck_cargotype');
    }
}
