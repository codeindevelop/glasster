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
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('publish_id');
            
            $table->string('post_name');
            $table->text('slug');
            $table->longText('post_content')->nullable();
            $table->text('post_featured_image')->nullable();
            $table->boolean('comment_status')->default(true);
            $table->boolean('active')->default(true);
            $table->dateTime('publish_date')->nullable();
            $table->string('post_password')->nullable();
            $table->bigInteger('reads')->unsigned()->default(0)->index();
            
            // seo configurate
            $table->string('search_engine_flow')->nullable();
            $table->string('search_engine_index')->nullable();
            $table->string('canonical_link')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->longText('meta_tags')->nullable();

            // OG configuration
            $table->string('og_locale')->nullable();
            $table->string('og_title')->nullable();
            $table->longText('og_description')->nullable();
            $table->string('og_type')->nullable();
            $table->string('og_url')->nullable();
            $table->string('og_site_name')->nullable();
            $table->longText('og_image')->nullable();
            
            // twitter description
            $table->string('twitter_card')->nullable();
            $table->string('twitter_creatort')->nullable();
            $table->string('twitter_label1')->nullable();
            $table->string('twitter_data1')->nullable();
            $table->string('twitter_label2')->nullable();
            $table->string('twitter_data2')->nullable();
            $table->string('twitter_site')->nullable();
            $table->string('twitter_title')->nullable();
            $table->string('twitter_description')->nullable();
            $table->string('twitter_url')->nullable();
            $table->longText('twitter_image')->nullable();

            // FaceBook Configuration
            $table->string('article_publisher')->nullable();
            $table->string('article_publish_time')->nullable();
            $table->string('article_modified_time')->nullable();
           


            $table->timestamps();
            $table->softDeletes();

            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('post_categories')->cascadeOnDelete();
            $table->foreign('publish_id')->references('id')->on('post_publish_statuses')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
