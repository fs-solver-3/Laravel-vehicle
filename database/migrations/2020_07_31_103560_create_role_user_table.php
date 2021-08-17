<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('role_user', function (Blueprint $table) {
            $table->bigInteger('roles_id')->unsigned()->nullable();
            $table->foreign('roles_id', 'fk_p_54416_54418_user_rol_596eec0af3746')->references('id')->on('roles')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id', 'fk_p_54417_54418_role_use_596eec0af37c1')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}