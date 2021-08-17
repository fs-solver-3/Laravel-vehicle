<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPdf1VerifyToPassportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('passport', function (Blueprint $table) {
            //
            $table->boolean('pdf1_verify')->default(false);
            $table->boolean('pdf2_verify')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('passport', function (Blueprint $table) {
            //
        });
    }
}
