<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('register_type'); 
            $table->boolean('email_verification');
            $table->string('otp_login'); // SMS or Email or Authenticator
            $table->boolean('can_register');
            $table->boolean('facebook_login');
            $table->boolean('google_login');
            $table->boolean('twitter_login');
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
        Schema::dropIfExists('auth_settings');
    }
};
