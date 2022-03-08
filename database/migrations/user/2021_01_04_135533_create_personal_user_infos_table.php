<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_user_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('father_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('shenasname_no')->nullable();
            $table->string('mellicode')->nullable();
            $table->unsignedInteger('country_id');
            $table->text('home_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('image_mellicard')->nullable();
            $table->text('image_selfi')->nullable();
            $table->boolean('verified')->nullable();
            $table->string('status');
            $table->timestamp('user_verified_at')->nullable();


            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_user_infos');
    }
}
