<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhoneToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('surname')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->boolean('isVerified')->default(false);
            $table->string('avatar')->nullable()->default(null);
            $table->integer('invited_id')->nullable();
            $table->float('balance')->nullable()->default(0);
            $table->string('address')->nullable()->default(null);
            $table->string('email_verification_token')->nullable()->default(null);
            $table->boolean('active')->default(true);
            $table->string('paypal_email')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('phone');
            $table->dropColumn('isVerified');
            $table->dropColumn('avatar');
            $table->dropColumn('invited_id');
            $table->dropColumn('balance');
            $table->dropColumn('surname');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('email_verification_token');
            $table->dropColumn('active');
            $table->dropColumn('paypal_email');
        });
    }
}
