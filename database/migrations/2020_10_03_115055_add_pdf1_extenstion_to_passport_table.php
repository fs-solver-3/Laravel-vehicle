<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPdf1ExtenstionToPassportTable extends Migration
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
            $table->string('pdf1_extension')->nullable();
            $table->string('pdf2_extension')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pasport', function (Blueprint $table) {
            //
        });
    }
}
