<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('des')->nullable();
            $table->string('h1_header')->nullable();
            $table->string('page_title')->nullable();
            $table->string('page_logo')->nullable();
            $table->string('url')->nullable();
            $table->text('keywords')->nullable();
            $table->text('seo_text')->nullable();
            $table->boolean('publish')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
