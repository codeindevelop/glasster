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
        Schema::create('email_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('language_id')->index();
            $table->string('template_name');
            $table->text('subject');
            $table->text('from_name');
            $table->longText('email_text');
            $table->boolean('active');
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('languages'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_templates');
    }
};
