<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->bigInteger('permissions_id')->unsigned()->nullable();
            $table->foreign('permissions_id', 'fk_p_54415_54416_role_per_596eec08308d0')->references('id')->on('permissions')->onDelete('cascade');
            $table->bigInteger('roles_id')->unsigned()->nullable();
            $table->foreign('roles_id', 'fk_p_54416_54415_permissi_596eec0830986')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
    }
}
