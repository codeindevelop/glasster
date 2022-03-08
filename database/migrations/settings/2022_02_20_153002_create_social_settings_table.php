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
        Schema::create('social_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('instagram')->nullable();
            $table->longText('telegram')->nullable();
            $table->longText('whatsapp')->nullable();
            $table->longText('whatsapp_business')->nullable();
            $table->longText('facebook_user')->nullable();
            $table->longText('facebook_page')->nullable();
            $table->longText('twitter')->nullable();
            $table->longText('skype')->nullable();
            $table->longText('youtube')->nullable();
            $table->longText('aparat')->nullable();
            $table->longText('tiktok')->nullable();
            $table->longText('pintrest')->nullable();
            $table->longText('linkdin')->nullable();
            $table->longText('dribbble')->nullable();
            $table->longText('snapchat')->nullable();
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
        Schema::dropIfExists('social_settings');
    }
};
