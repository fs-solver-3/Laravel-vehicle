<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_all', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('indexing')->nullable();
            $table->string('area1')->nullable();
            $table->string('area2')->nullable();
            $table->string('fias_code')->nullable();
            $table->string('settlement')->nullable();
            $table->string('page_title')->nullable();
            $table->text('des')->nullable();
            $table->string('h1_header')->nullable();
            $table->string('url')->nullable();
            $table->text('keywords')->nullable();
            $table->text('seo_text')->nullable();
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
        Schema::dropIfExists('seo_all');
    }
}
