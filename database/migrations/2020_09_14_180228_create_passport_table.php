<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passport', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id', 'fk_p_54415_54416_passport_per_556eec08408d0')->references('id')->on('users')->onDelete('cascade');
            $table->string('series')->nullable();
            $table->string('room')->nullable();
            $table->string('department_code')->nullable();
            $table->string('issued_by')->nullable();
            $table->string('place_residence')->nullable();
            $table->string('pdf1')->nullable();
            $table->string('pdf2')->nullable();
            $table->boolean('verified')->default(false);
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
        Schema::dropIfExists('passport');
    }
}
