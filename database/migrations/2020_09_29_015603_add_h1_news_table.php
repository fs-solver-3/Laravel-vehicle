<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddH1NewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('h1')->nullable();
            $table->string('page_url')->nullable();
            $table->text('author')->nullable();
            $table->string('author_image')->nullable();
            $table->text('short_des')->nullable();
            $table->boolean('page_included')->nullable();
            $table->boolean('publish_author')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            //
        });
    }
}
