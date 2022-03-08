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
        Schema::create('seo_global_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('site_default_title')->nullable();
            
            $table->boolean('default_index')->nullable(); // false = noIndex , true = Index -
            $table->boolean('default_follow')->nullable(); // false = noFollow , true = Follow
            $table->text('default_meta_description')->nullable(); // Set the page meta description

            $table->text('default_twitter_cardtype')->nullable(); // summary, summary_large_image, app, or player
            $table->text('default_twitter_site')->nullable(); // @username for the website used in the card footer
            $table->text('default_twitter_handle')->nullable(); // @username for the content creator / author (outputs as twitter:creator)

            $table->text('default_og_url')->nullable(); // www.luxiloom.com
            $table->text('default_og_sitename')->nullable(); 
            $table->text('default_og_title')->nullable();
            $table->text('default_og_type')->nullable(); // website
            $table->text('default_og_locale')->nullable(); // fa_IR
            $table->text('default_og_description')->nullable();
            $table->text('default_og_image')->nullable();

            $table->text('default_twitter_title')->nullable();
            $table->text('default_twitter_description')->nullable();
            $table->text('default_twitter_image')->nullable();

            $table->text('default_facebook_title')->nullable();
            $table->text('default_facebook_description')->nullable();
            $table->text('default_facebook_image')->nullable();
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
        Schema::dropIfExists('seo_global_settings');
    }
};
