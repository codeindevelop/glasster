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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('website_name');
            $table->string('company_name')->nullable();
            $table->string('main_domain');
            $table->boolean('rtl_admin');
            $table->boolean('rtl_userpanel');
            $table->boolean('rtl_site');
            $table->text('favicon_file')->nullable();
            $table->text('main_logo_light')->nullable();
            $table->text('main_logo_dark')->nullable();
            $table->text('footer_logo')->nullable();
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
        Schema::dropIfExists('general_settings');
    }
};
