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
        Schema::create('email_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email_protocol'); //SMTP - SendMail 
            $table->string('email_encryption'); // none - ssl - tsl
            $table->string('smtp_host')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('email')->nullable();
            $table->string('smtp_username')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('email_charset');  // UTF-8
            $table->text('email_signature');
            $table->longText('email_logo');
            $table->longText('email_header');
            $table->longText('email_footer');
            $table->boolean('show_instagram');
            $table->boolean('show_twitter');
            $table->boolean('show_facebook');
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
        Schema::dropIfExists('email_settings');
    }
};
